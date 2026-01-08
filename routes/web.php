<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\MathController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// GROUP 1: PUBLIC SCOPE
Route::name('public.')->group(function () {
    
    // A. Scope-Level Routes
    Route::get('/', [MathController::class, 'index'])->name('home');

    // B. MATH DOMAIN CONTEXT
    Route::prefix('math')->name('math.')->group(function () {
        
        // Single Responsibility Actions
        Route::get('calculator', [MathController::class, 'calculator'])->name('calculator');
        Route::get('formulas', [MathController::class, 'formulas'])->name('formulas');
        Route::get('solver', [MathController::class, 'solver'])->name('solver');
        
    });

});
