<?php

use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/post',[PostController::class ,'index']);
Route::get('/posts',[PostApiController::class ,'index']);
 
Route::post('/posts',[PostApiController::class ,'store'])->name(name:'posts.store');
// Route::put('/posts/{post}',[PostApiController::class ,'update'])->name(name:'posts.update');
// Route::delete('/posts/{post}',[PostApiController::class ,'destroy'])->name(name:'posts.destroy');
Route::get('/posts/{post}',[PostApiController::class ,'show']);


use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
 
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});