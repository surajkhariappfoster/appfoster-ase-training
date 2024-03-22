<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CrudController;

//API for users
Route::get('users',[UserController::class,'index']);
Route::get('users/getUser/{user_id}',[UserController::class,'getUser']);



//API for projects
Route::get('projects/{user_id}/project',[ProjectController::class,'project']);


//API to insert new user into users table
Route::post('users', [CrudController::class,'create']);



