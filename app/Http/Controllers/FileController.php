<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\File\StoreFileRequest;
use Illuminate\Http\JsonResponse;

class FileController extends Controller
{

    public function store(StoreFileRequest $request)
    {
        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();
        $random_name = 'upload/' . random_int(1000, 9999) . time() . '.' . $extension;

        $file->storeAs('public/' . $random_name);

        $data = File::create([
            'name' =>  $file->getClientOriginalName(),
            'path' => url('') . '/storage/' . $random_name,
            'type' => $file->getClientMimeType(),
            'user_id' => auth()->id(),
        ]);

        return new JsonResponse([
            'data' => $data
        ], 201);
    }

    public function show(int $id)
    {
        $file = File::findOrFail($id);

        return new JsonResponse([
            'data' => $file
        ]);
    }

    public function destroy(int $id)
    {
        $file = File::findOrFail($id);

        if (auth()->check() && auth()?->user()?->cannot('delete', $file)) return new JsonResponse([
            'message' => 'No access'
        ], 403);

        return new JsonResponse([
            'message' => 'Deleted'
        ]);
    }
}
