<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::all()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => \App\Models\Task::findOrfail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
$data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required']);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task created successfully');
})->name('tasks.store');

//Route::get('/zzz', function () {
//    return 'hello world';
//})->name('hello');
//
//Route::get('/hallo', function () {
//    return redirect()->route('hello');
//});
//
//Route::get('/greet/{name}', function ($name) {
//    return 'hello ' . $name;
//});

Route::fallback(function () {
    return 'still got somewhere!';
});
