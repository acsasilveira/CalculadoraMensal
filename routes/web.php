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

Route::get('/', function () {
    return view('index');
});

Route::get('/receita', [App\Http\Controllers\controladorPrincipal::class, 'index'])->name('receitas');

Route::post('/despesas', [App\Http\Controllers\controladorPrincipal::class, 'receitas'])->name('despesas');

Route::post('/calculo', [App\Http\Controllers\controladorPrincipal::class, 'despesas'])->name('calculo');