@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')
    <style>
        .error-message {
            color: red;
        }
    </style>
@endsection
@section('content')
    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            @error('title')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
            @error('title')
            <p class="error-message">{{$message}}</p>
            @enderror

        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
            @error('title')
            <p class="error-message">{{$message}}</p>
            @enderror

        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection
