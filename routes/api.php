<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Listar Reports
    Route::get('reports', [ReportController::class, 'listReports'])->name('reports.list');

    // Criar Reports
    Route::put('reports', [ReportController::class, 'createReport'])->name('reports.create');

    // Deletar Reports
    Route::post('reports/{id}', [ReportController::class, 'deleteReport'])->name('reports.delete');
});
