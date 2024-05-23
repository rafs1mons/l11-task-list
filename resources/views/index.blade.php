@extends('layouts.app')

@section('title', 'The list of the tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add Task</a>
    </nav>
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks</div>
    @endforelse
    @if ($tasks->count())
        <nav>
        {{$tasks->links()}}

        </nav>
    @endif
@endsection
