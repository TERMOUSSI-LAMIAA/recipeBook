<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\recetteController;
use App\Http\Controllers\userController;

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
Route::get('/details/{id}', [recetteController::class, 'showRecipeDetails'])->name('details');

Route::get('/addRecipeForm', [recetteController::class, 'AddFormController']);
Route::post('/addRecipe', [recetteController::class, 'addRecipe'])->name('addRecipe');
Route::get('updtForm/{idr}', [recetteController::class, 'updtForm'])->name('updtForm');
Route::put('/updtRecipeAction/{id}', [recetteController::class, 'updtRecipeAction'])->name('updtRecipeAction');
Route::get('/delete/{id}', [recetteController::class, 'deleteRecipe'])->name('delete');
Route::get('/search', [recetteController::class, 'searchRecipe'])->name('search');
Route::get('/userRecipes', [recetteController::class, 'userRecipes'])->name('userRecipes');

Route::post('/login', [userController::class, 'authenticate'])->name('login');
Route::get('/login_form', [userController::class, 'loginForm'])->name('login_form');
Route::get('/logout', [userController::class, 'logout'])->name('logout');
