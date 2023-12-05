<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;
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
//     return view('welcome');
// });
Route::get('/', [Homecontroller::class, 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect', [Homecontroller::class, 'redirect']);
Route::get('/details/{id}', [Homecontroller::class, 'details']);

Route::get('/view_categorie', [Admincontroller::class, 'view_categorie']);
Route::post('/add_categorie', [Admincontroller::class, 'add_categorie']);
Route::get('/delete_categorie/{id}', [Admincontroller::class, 'delete_categorie']);

Route::get('/voir_product', [Admincontroller::class, 'voir_product']);
Route::post('/add_product', [Admincontroller::class, 'add_product']);
Route::get('/show_product', [Admincontroller::class, 'show_product']);
Route::get('/supprimer/{id}', [Admincontroller::class, 'supprimer']);
Route::get('/update_product/{id}', [Admincontroller::class, 'update_product']);
Route::post('/add_product_confirm/{id}', [Admincontroller::class, 'add_product_confirm']);

Route::post('/add_cart/{id}', [Homecontroller::class, 'add_cart']);
Route::get('/show_cart', [Homecontroller::class, 'show_cart']);
Route::get('/remove_cart/{id}', [Homecontroller::class, 'remove_cart']);

Route::get('/cash_order', [Homecontroller::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [Homecontroller::class, 'stripe']);
