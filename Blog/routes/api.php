<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostControllerApi as ApiPostController;

/** Example: Authenticated user route, if using sanctum */
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/** Example: Test route */
Route::get('/GreetingApi', function () {
    return ['name' => 'Greeting Api'];
});


Route::get('/posts', [ApiPostController::class, 'index']);
Route::get('/posts/{id}', [ApiPostController::class, 'show']);
Route::post('/posts', [ApiPostController::class, 'store']);
Route::put('/posts/{id}', [ApiPostController::class, 'update']);
Route::delete('/posts/{id}', [ApiPostController::class, 'destroy']);

?>