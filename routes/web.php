<?php
use App\Http\Controllers\AdminResultController;
use App\Http\Controllers\StudentResultController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/upload', [AdminResultController::class, 'index'])->name('admin.upload');
Route::post('/admin/upload', [AdminResultController::class, 'store'])->name('admin.upload.store');
Route::get('/', [StudentResultController::class, 'index'])->name('student.index'); // Changed from 'index' to 'student.index'
Route::post('/results', [StudentResultController::class, 'show'])->name('student.results');
Route::get('/results/download', [StudentResultController::class, 'downloadPdf'])->name('student.results.download');