<?php
use App\Http\Controllers\AdminResultController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/upload', [AdminResultController::class, 'index'])->name('admin.upload');
Route::post('/admin/upload', [AdminResultController::class, 'store'])->name('admin.upload.store');