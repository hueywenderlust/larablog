<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ArticleController;

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

Route::get('/about', function(){

    // get all articles
    // $article = App\Models\Article::all();

    // get articles based on the number of articles in the page (this will get 2 articles in this page)
    // $article = App\Models\Article::paginate(2);

    // get the articles sort the latest one
    // $article = App\Models\Article::latest()->get();


    // return $article;

    return view('about', [
        // get most recent 3 articles
        'articles' => App\Models\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticleController@index')->name('get.articles');
Route::get('/articles/create', 'ArticleController@create');
Route::post('/articles/create', 'ArticleController@store');
Route::get('/articles/{article}', 'ArticleController@show')->name('article.show');
Route::get('/articles/edit/{article}', 'ArticleController@edit');
Route::put('/articles/edit/{article}', 'ArticleController@update');


// Route::get('/about', 'ArticleController@getArticles')->name('about');

Route::get('contact', function () {
    return view('contact');
});