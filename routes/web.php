<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/create', [HomeController::class, 'create'])->name('create');

Route::post('/save', [HomeController::class, 'save'])->name('save');

Route::get('/edit/{idEditar}', [HomeController::class, 'edit'])->name('edit');

Route::put('/update/{idEditar}', [HomeController::class, 'update'])->name('update');

Route::delete('/delete/{idEliminar}', [HomeController::class, 'delete'])->name('delete');