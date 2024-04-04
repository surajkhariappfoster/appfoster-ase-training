<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::get('users/{id}', [UserController::class, 'shows'])->name('users.shows');

Route::get('users', [UserController::class, 'index'])->name('users.index');


Route::get('users/create', [UserController::class, 'create'])->name('users.create');

Route::post('users/store', [UserController::class, 'store'])->name('users.store');


Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');



Route::put('users/{id}/update', [UserController::class, 'update'])->name('users.update');


Route::delete('users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');;



Route::get('users/{id}/show', [UserController::class, 'show'])->name('users.show');




Route::get('users/{id}/projects', [UserController::class, 'showProjects'])->name('users.projects');


