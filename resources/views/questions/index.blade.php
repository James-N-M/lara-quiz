@extends('layouts.app')

@section('content')
    <h1>Questions</h1>

    @forelse ($questions as $question)
        <li>{{ $question->question }}</li>
    @empty
        <p> no questions yet </p>
    @endforelse

@endsection