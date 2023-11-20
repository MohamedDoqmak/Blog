<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

Route::post('newsletter', function () {
    request()->validate([
        'email' => ['required', 'email']
    ]);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us14'
    ]);
    try {
        $response = $mailchimp->lists->addListMember("b37f46840e", [
            "email_address" => request('email'),
            "status" => "subscribed"
        ]);
    } catch (\Exception $e) {
        ValidationException::withMessages([
            'email' => 'This email couldnt be added to our news letter'
        ]);
    }
    return redirect('/')->with('success', 'you are now subscried to our newsletter');
});

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts
    ]);
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
    Route::post('sessions', [SessionsController::class, 'store']);
    Route::get('login', [SessionsController::class, 'create']);
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


