@extends('layouts.app')

@section('content')
    <h1>{{ $quiz->name }}</h1>

    <form action="">
        @forelse ($quiz->questions as $question)
            <li>{{$question->question}}</li>
            @foreach($question->choices as $choice)
                - {{$choice->choice}}
            @endforeach
        @empty
            <p> no quiz questions yet </p>
        @endforelse
    </form>
@endsection