<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManzanaController;

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
    return view('welcome');
});

//Ruta para ver manzanas
Route::get('/VerManzanas',[ManzanaController::class, 'index'])->name('VerManzanas.index')->middleware(['auth', 'verified']);

//Ruta para eliminar manzanas
Route::delete('/VerManzanas', [ManzanaController::class, 'destroy'])->name('VerManzanas.destroy')->middleware((['auth','verified','eliminadas']));

//Ruta para mostrar formulario para insertar manzanas
Route::get('/InsertarManzana',[ManzanaController::class, 'create'])->name('InsertarManzana.create')->middleware(['auth', 'verified']);

//Ruta para insertar la manzana en la base de datos
Route::post('/InsertarManzana',[ManzanaController::class, 'store'])->name('InsertarManzana.store')->middleware(['auth', 'verified']);

//Ruta para mostrar el formulario para editar manzanas
Route::get('/EditarManzanas/{manzana}', [ManzanaController::class, 'edit'])->name('EditarManzanas.edit')->middleware(['auth', 'verified']);

//Ruta para modificar la manzana en la base de datos
Route::post('/EditarManzanas', [ManzanaController::class, 'update'])->name('EditarManzanas.update')->middleware(['auth', 'verified']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
