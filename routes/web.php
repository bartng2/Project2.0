<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('layout');
//});
use App\Http\Controllers\qlnsview; 

// Route::group(['middleware' => 'auth'], function () {
	Route::get('/', [qlnsview::class, 'index'])->name('qlns.index');

	Route::get('/qlns/create', [qlnsview::class, 'create'])->name('qlns.create');
	Route::post('/qlns',[qlnsview::class, 'store'])->name('qlns.store');

	Route::get('/qlns/{id}/edit', [qlnsview::class, 'edit'])->name('qlns.edit');
	Route::put('/qlns/{id}',[qlnsview::class, 'update'])->name('qlns.update');

	Route::delete('qlns/{id}',[qlnsview::class, 'destroy'])->name('qlns.destroy');

	Route::get('/qlns/{id}', [qlnsview::class, 'show'])->name('qlns.show');

	Route::get('/qlns/search', [qlnsview::class, 'search'])->name('qlns.search');

	
// });
