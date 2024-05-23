@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{$task->description}}</p>

    @if($task->long_description)
        <p>{{$task->long_description}}</p>
    @endif

    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>

    <p>
        @if($task->completed)
            Completed
        @else
            Incomplete
        @endif
    </p>
    <div>
        <a href="{{ route('tasks.edit', $task) }}">Edit</a>
    </div>

    <div>
        <form method="post" action="{{route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{ $task->completed ? 'incomplete' : 'complete'}}
            </button>
        </form>
    </div>

    <div>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
