<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\ChatController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new/post', function () {
    return view('post');
});

// Route::XX('see-in-browser','lookup-in-project');

Route::post('/create', [SocialMediaController::class, 'sendTelegramMessage']);
Route::get('/new/post', [SocialMediaController::class, 'listTweets']);
Route::any('/chat/{name?}', [ChatController::class, 'chat']);

Route::get('/vedachat', [ChatController::class, 'vedaChat']);
Route::any('/veda/input/{name?}', [ChatController::class, 'vedaChatApp']);
Route::get('/auth/registration', [ChatController::class, 'registrationGet']);
Route::post('/auth/registration', [ChatController::class, 'registrationPost']);

Route::get('/auth/login', [ChatController::class, 'loginGet']);
Route::post('/auth/login', [ChatController::class, 'loginPost']);
