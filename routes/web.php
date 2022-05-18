<?php

use Illuminate\Support\Facades\Route;
use App\Events\webDown;
use App\Models\User;


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

Route::get('/', function () {
    return view('welcome');
});

 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/send',[App\Http\Controllers\MailController::class , 'send'])->name('sendMail');
// Route::get('/down' , [App\Http\Controllers\checkWebController::class , 'checkweb'])->name('down');

Route::get('/down' , function(){
    $user = User::find(4) ;
    return event(new webDown($user));
});
