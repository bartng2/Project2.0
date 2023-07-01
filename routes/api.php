<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Controllers\qlnscontroller;
Route::get('qlns',[qlnscontroller::class, 'index']);
Route::get('qlns/{id}',[qlnscontroller::class, 'show']);
Route::post('qlns',[qlnscontroller::class, 'store']);
Route::put('qlns/{id}',[qlnscontroller::class, 'update']);
Route::delete('qlns/{id}',[qlnscontroller::class, 'destroy']);
Route::get('qlns/search',[qlnscontroller::class, 'search']);

use App\Http\Controllers\adcontroller;
use App\Http\Controllers\regiscontroller;
Route::get('/register', [regiscontroller::class, 'register'])->name('register');
Route::post('/register', [regiscontroller::class, 'createUser'])->name('register.post');

Route::get('/login', [adcontroller::class, 'login'])->name('login');
Route::post('/login', [adcontroller::class, 'loginrequest'])->name('login.post');