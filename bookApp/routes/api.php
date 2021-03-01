<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\API\BookController;
use App\Models\Book;

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

Route::middleware('auth:sanctum')->group(function () {
   Route::resource('book', BookController::class);
});


//Route::get('/book', 'BookController@show');
//Route::post('/book', [BookController::class, 'create']);
//Route::put('/book/{book}', 'BookController@update');
//Route::delete('/book/{book}', 'BookController@destroy');
