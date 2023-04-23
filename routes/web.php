<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
//this middleware responsible for the access to the register page so the accessability be only for guests
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');

Route:: get ('ping', function () {
    
    $mailchimp = new \MailchimpMarketing\ApiClient() ;
    $mailchimp->setConfig ([
    'apiKey' => config('services.mailchimp.key'),
    'server' => 'us21'
    ]);
    $response = $mailchimp->lists->getListMembersInfo("a4407b043e") ;
    dd($response) ;
});
