<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Listar Reports
    Route::get('reports', [ReportController::class, 'listReports'])->name('reports.list');

    // Criar Reports
    Route::post('reports', [ReportController::class, 'createReport'])->name('reports.create');
        
    // Visualizar Report
    Route::get('reports/{id}', [ReportController::class, 'showReport'])->name('reports.show');

    // Atualizar Reports
    Route::put('reports/{id}', [ReportController::class, 'updateReport'])->name('reports.update');

    // Deletar Reports
    Route::delete('reports/{id}', [ReportController::class, 'deleteReport'])->name('reports.delete');    
});
