<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\SlideController;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

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
    $categories = Category::all();
    $contacts = Contact::all();
    $articles = Article::latest()->take(20)->get();
    $datas = Article::latest()->get();

    return view('welcome', ['categories'=>$categories, 'contacts'=>$contacts, 'articles' => $articles, 'datas' => $datas]);
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('admin', function() {
    return view('admin');
})->middleware('auth');

//admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('contacts', ContactController::class);
});

Route::get('categories/{category}', [CategoryController::class, 'show']);
Route::get('categories/{category}/{article}', [CategoryController::class, 'readArticle']);


Route::post('/makeotp', [OtpController::class, 'makeOtp'])->name('makeOtp');