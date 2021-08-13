<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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


// Public routes 
// Route::resource('books', BooksController::class);
Route::get('/books/search/{title}', [BooksController::class, 'search']);
Route::get('/books', [BooksController::class, 'index']);
Route::get('/books/{id}', [BooksController::class, 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/author/{id}', [AuthorController::class, 'show']);
Route::get('/author', [AuthorController::class, 'index']);

//Protected routes
Route::group(['middleware' => ['auth:sanctum']],function ()  {
    Route::post('/books', [BooksController::class, 'store']);
    Route::put('/books/{id}', [BooksController::class, 'update']);
    Route::delete('/books/{id}', [BooksController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
