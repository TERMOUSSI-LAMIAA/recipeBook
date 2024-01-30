<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\recetteController;

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

Route::get('/', [recetteController::class, 'showRecette'])->name('home');
;
Route::get('/addRecipeForm', [recetteController::class, 'AddFormController']);
Route::post('/addRecipe', [recetteController::class, 'addRecipe'])->name('addRecipe');
Route::get('updtForm/{idr}', [recetteController::class, 'updtForm'])->name('updtForm');
Route::post('/updtRecipeAction', [recetteController::class, 'updtRecipeAction'])->name('updtRecipeAction');