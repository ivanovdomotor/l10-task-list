@extends('layouts.app')

@section('title','All Tasks:')
@section('content')
    @forelse($tasks as $task)
        <p>
            <a href="{{ route('tasks.show',['id'=>$task->id]) }}">{{ $task->title }}</a>
        </p>
    @empty
        <span>There are no tasks!</span>
    @endforelse
@endsection
