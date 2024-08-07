<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
// use App\Models\EmailCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Rostislav\LaravelFilters\Filter;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginAuthRequest $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        if ($user->is_blocked) {
            return new JsonResponse([
                'message' => 'The account is banned'
            ]);
        }

        $token = JWTAuth::fromUser($user);

        // EmailCode::where('email', $request->email)->delete();

        return $this::createNewToken($token, $user);
    }

    public function register(RegisterAuthRequest $request)
    {
        $only = $request->only(['full_name', 'tel', 'email']);

        $user = User::create([
            'login' =>  uniqid('@'),
            ...$only,
        ]);

        // $user->company()->create([

        // ]);

        // if ($request->role === 'dealer') {
        //     $user->tariff()->create([
        //         'user_id' => $user->id,
        //         'tariff_id' => $request->tariff_id,
        //         'date_end' => Carbon::now()->addMonths(6)
        //     ]);
        // }

        $token = JWTAuth::fromUser($user);
        // EmailCode::where('email', $request->email)->delete();

        return $this::createNewToken($token, $user);
    }

    public function logout()
    {
        auth()?->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh()
    {
        return $this::createNewToken(auth()?->refresh());
    }

    public function me(Request $request)
    {
        // if (auth()?->user()?->is_blocked) {
        //     return new JsonResponse([
        //         'message' => 'The account is banned'
        //     ], 400);
        // }

        return response()->json([
            'data' => Filter::one($request, new User, auth()->id())
        ]);
    }

    public static function createNewToken($token, $user = null)
    {
        if (auth()->check()) $user = auth()->user();

        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()?->factory()->getTTL() * 60 * 24 * 7,
                'user' => $user
            ]
        ], 201);
    }
}
