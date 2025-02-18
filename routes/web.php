<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Node\Block\AbstractBlock;

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

//Routing

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/', function () {
    return 'Selamat Datang';
});

// Route::get('/about', function () {
//     return 'NIM:2341720215 Nama: Atthalaric Nero';
// });

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function (
    $postId,
    $commentId
) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

// Route::get('/articles/{id}', function($artikelId) {
//     return 'Halaman Artikel dengan ID ' . $artikelId;
// });

Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
});

Route::get('/user/profile', function () {
    return 'Ini adalah halaman profile';
})->name('profile');

//Controller
Route::get('/hello', [WelcomeController::class, 'hello']);

Route::prefix('page')->group(function () {
    Route::get('/', [PageController::class, 'index']);
    Route::get('/about', [PageController::class, 'about']);
    Route::get('/articles/{artikelId}', [PageController::class, 'articles']);
});

Route::get('/', HomeController::class);
Route::get('/about', AboutController::class);
Route::get('/articles/{idArticle}', ArticleController::class);

Route::resource('photos', PhotoController::class);
Route::resource('photos', PhotoController::class)->only(['index', 'show']);
Route::resource('photos', PhotoController::class)->except([
    'create',
    'store',
    'update',
    'destroy'
]);

// View

// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Atthalaric Nero Muchtar']);
// });

Route::get('/greeting', [WelcomeController::class, 'greeting']);