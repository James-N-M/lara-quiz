@extends('layouts.app')

@section('content')
    @forelse ($quizzes as $quiz)
        <a href="/lara-quiz/quizzes/{{$quiz->id}}"><li>{{ $quiz->name }}</li></a>
    @empty
        <p> no quizzes yet </p>
    @endforelse
@endsection