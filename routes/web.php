<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

Route::get('/', [TodoListController::class, 'index'] );
Route::post('/saveItemRoute',[TodoListController::class, 'saveItem'])->name('saveItem');
Route::post('/markCompleteRoute/{id}',[TodoListController::class, 'markComplete'])->name('markComplete');
