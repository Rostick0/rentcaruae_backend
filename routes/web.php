<?php

use App\Http\Controllers\StorageImageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/storage-custom/upload/image/{year}/{month}/{day}/{path}', [StorageImageController::class, 'show']);
