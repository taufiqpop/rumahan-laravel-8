<?php

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index'])->name('blog')->middleware('rbac:blog');
Route::get('/data', [BlogController::class, 'data'])->name('blog.data')->middleware('rbac:blog');
Route::post('/store', [BlogController::class, 'store'])->name('blog.store')->middleware('rbac:blog,2');
Route::patch('/update', [BlogController::class, 'update'])->name('blog.update')->middleware('rbac:blog,3');
Route::delete('/delete', [BlogController::class, 'delete'])->name('blog.delete')->middleware('rbac:blog,4');
