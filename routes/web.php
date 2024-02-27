<?php

use App\Http\Controllers\LandingController;
use App\Livewire\Cargos;
use App\Livewire\Clientes;
use App\Livewire\Curriculos;
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

Route::middleware(['auth', 'verified'])->group(function() {
    Route::view('/admin', 'dashboard')->name('dashboard');
    Route::get('/admin/cargos', Cargos::class)->name('cargos.index');
    Route::get('/admin/clientes', Clientes::class)->name('clientes.index');
    Route::get('/admin/curriculos', Curriculos::class)->name('curriculos.index');
    Route::view('/admin/profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';

// Route::get('/admin', function() {
//     return 'asd';
// });
Route::get('/{lang?}', LandingController::class);



