<?php

use Illuminate\Http\Request;
use App\Post;

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
Route::get('/', 'ArticleController@index' );
Route::post('register', 'RegisterController@register');
Route::post('login', 'RegisterController@login');
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//});
Route::group(['middleware' => 'auth:api'], function(){
  Route::get('/home/articles', 'ArticleController@viewArts')->name('viewArts');
  Route::get('/home/articles/{article}', 'ArticleController@show');
  Route::post('/home/articles', 'ArticleController@store');
  Route::put('/home/articles/{article}', 'ArticleController@update');
  Route::delete('/home/articles/{article}', 'ArticleController@delete');
});
