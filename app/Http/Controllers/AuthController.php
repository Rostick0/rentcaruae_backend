<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
// use App\Models\EmailCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Login
     * @OA\Post (
     *     path="/api/auth/login",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="password",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "email":"john@test.com",
     *                     "password":"johnjohn1"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="object",
     *                  @OA\Property(property="access_token", type="string", example="randomtokenasfhajskfhajf398rureuuhfdshk"),
     *                  @OA\Property(property="token_type", type="string", example="Bearer"),
     *                  @OA\Property(property="expires_in", type="number", example=3600),
     *                  @OA\Property(property="user", type="object",
     *                      ref="#/components/schemas/UserSchema"
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Validation error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="message", type="string", example="The email field is required. (and 1 more errors)"),
     *                  @OA\Property(property="errors", type="object",
     *                      @OA\Property(property="email", type="array", collectionFormat="multi",
     *                        @OA\Items(
     *                          type="string",
     *                          example="The email field is required.",
     *                          )
     *                      ),
     *                      @OA\Property(property="password", type="array", collectionFormat="multi",
     *                        @OA\Items(
     *                          type="string",
     *                          example="The password field is required.",
     *                          )
     *                      ),
     *                  ),
     *          )
     *      )
     * )
     */
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
        $only = $request->only(['name', 'email', 'phone', 'role']);

        $user = User::create([
            'login' =>  uniqid('@'),
            ...$only,
        ]);

        if ($request->role === 'dealer') {
            $user->tariff()->create([
                'user_id' => $user->id,
                'tariff_id' => $request->tariff_id,
                'date_end' => Carbon::now()->addMonths(6)
            ]);
        }

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

    public function me()
    {
        if (auth()?->user()?->is_blocked) {
            return new JsonResponse([
                'message' => 'The account is banned'
            ], 400);
        }

        return response()->json([
            'data' => auth()?->user()
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
