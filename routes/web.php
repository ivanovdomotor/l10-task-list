<?php
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.home');

Route::view('tasks/create','create'
)->name('tasks.create');;

Route::get('/tasks/{id}', function ($id) {
    return view('task', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request){
    $data = $request->validate([
        'title'=> 'required|max:255',
        'description'=>'required',
        'long_description'=>'required'
    ]);
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show',['id'=>$task->id]);

})->name('tasks.store');