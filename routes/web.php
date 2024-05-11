<?php
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index', [
        'tasks' => Task::latest()->where('completed',true)->get()
    ]);
})->name('home');


Route::get('/tasks/{id}', function ($id) {
    return view('task', ['task' => Task::findOrFail($id)]);
})->name('tasks');
