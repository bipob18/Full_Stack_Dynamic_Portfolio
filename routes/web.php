<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\PortfolioEducationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index']);

Route::prefix('admin')
    ->middleware('portfolio.admin')
    ->name('admin.')
    ->group(function () {
        Route::redirect('/', '/admin/educations');

        Route::get('/educations', [PortfolioEducationController::class, 'index'])->name('educations.index');
        Route::get('/educations/create', [PortfolioEducationController::class, 'create'])->name('educations.create');
        Route::post('/educations', [PortfolioEducationController::class, 'store'])->name('educations.store');
        Route::get('/educations/{education}/edit', [PortfolioEducationController::class, 'edit'])->name('educations.edit');
        Route::put('/educations/{education}', [PortfolioEducationController::class, 'update'])->name('educations.update');
        Route::delete('/educations/{education}', [PortfolioEducationController::class, 'destroy'])->name('educations.destroy');
    });

