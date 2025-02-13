<?php

namespace App\Models;

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Task;
use Illuminate\Support\Facades\Route;
use App\Models\Tasks;



Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('login', [AuthManager::class, "login"])->name("login");

Route::get('logout', [AuthManager::class, "logout"])->name("logout");

Route::post('login', [AuthManager::class, "loginPost"])->name("login.post");

Route::get('register', [AuthManager::class, "register"])->name("register");

Route::post('register', [AuthManager::class, "registerPost"])->name("register.post");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::middleware("auth")->group(function(){
    Route::get('/',[Task::class,"listTask"])
        ->name("task.index");

    Route::get("task/add",[Task::class,"addTask"])->name('task.add');
    Route::post("task/add",[Task::class,"addTaskPost"])->name('task.add.post');
    //Route::get("task/edit/{id}",[Task::class,"edit"])->name('task.edit');
    Route::get('task/edit/{task}', [Task::class,"edit"])->name('task.edit');
    Route::put('task/update/{task}', [Task::class,"update"])->name('task.update');
    


    Route::get("task/status/{id}",[Task::class,"updateTaskStatus"])->name('task.status.update');
    Route::get("task/delete/{id}",[Task::class,"deleteTask"])->name('task.delete');   
    //Route::get("task/update/{id}",[Task::class,"update/{id}"])->name('task.update');
    
});


