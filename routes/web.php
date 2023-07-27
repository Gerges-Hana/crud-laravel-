<?php

use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;
use App\http\Controllers\HelloController;
use App\http\Controllers\PostController;
// use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Psr7\Uri;
use PharIo\Manifest\Url;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[PostController::class ,'index'])->name(name:'posts.index')->middleware(middleware:'auth');
Route::group(['middleware'=>['auth']],function(){

    Route::get('posts/create',[PostController::class,'create'])->name(name:'posts.create');
    Route::post('/posts',[PostController::class ,'store'])->name(name:'posts.store');
    Route::get('/posts/{post}/edit',[PostController::class ,'edit'])->name(name:'posts.edit');
    Route::put('/posts/{post}',[PostController::class ,'update'])->name(name:'posts.update');
    Route::delete('/posts/{post}',[PostController::class ,'destroy'])->name(name:'posts.destroy');
    Route::get('/posts/{post}',[PostController::class ,'show']);

});
Route::get('/hello',[HelloController::class ,'helloAction']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/2','HelloController@Action');
// Route::get('/hello',function(){

//     return View('hello',[
//         'name'=>'gerges',
//         'age'=>'33',
//         'books'=>['book1','book2','book3']
//     ]);
// });
