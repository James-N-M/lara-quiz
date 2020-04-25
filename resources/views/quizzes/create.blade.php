@extends('layouts.app')

@section('content')
    <h1>Create a Quiz</h1>

    <form method="POST" action="{{route('lara-quizzes.store')}}">
        @csrf
        <div class="form-group">
            <label for="name">Quiz Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Javascript level one quiz">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="questions">Questions</label>
            <select multiple name="questions[]" class="form-control" id="questions">
                @foreach($questions as $question)
                    <option value="{{$question->id}}">{{$question->question}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Quiz</button>
    </form>
@endsection