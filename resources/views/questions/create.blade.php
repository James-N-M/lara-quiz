@extends('layouts.app')

@section('content')
    <h1>Create a Question</h1>

    <form method="POST" action="{{route('lara-quizzes-questions.store')}}">
        @csrf
        <div class="form-group">
            <label for="question">Question</label>
            <input name="question" type="text" class="form-control" id="question" placeholder="Do you like JS">
        </div>

        <h2>Question Choices</h2>

        <div class="form-group">
            <label for="choice_text_1" class="control-label">Choice text</label>
            <input name="choice_text_1" type="text" class="form-control" id="choice_text_1">
        </div>

        <div class="form-group">
            <label for="correct_1" class="control-label">Is Correct</label>
            <input name="correct_1" type="hidden" value="0" id="correct_1">
            <input name="correct_1" type="checkbox" value="1" id="correct_1">
        </div>


        <!-- Choice 2-->

        <div class="form-group">
            <label for="choice_text_2" class="control-label">Choice 2 text</label>
            <input name="choice_text_2" type="text" class="form-control" id="choice_text_2">
        </div>

        <div class="form-group">
            <label for="correct_2" class="control-label">Is Correct</label>
            <input name="correct_2" type="hidden" value="0" id="correct_2">
            <input name="correct_2" type="checkbox" value="1" id="correct_2">
        </div>

        <!-- Choice 3-->

        <div class="form-group">
            <label for="choice_text_3" class="control-label">Choice 3 text</label>
            <input name="choice_text_3" type="text" class="form-control" id="choice_text_3">
        </div>

        <div class="form-group">
            <label for="correct_3" class="control-label">Is Correct</label>
            <input name="correct_3" type="hidden" value="0" id="correct_3">
            <input name="correct_3" type="checkbox" value="1" id="correct_3">
        </div>

        <!-- Choice 4-->

        <div class="form-group">
            <label for="choice_text_4" class="control-label">Choice 4 text</label>
            <input name="choice_text_4" type="text" class="form-control" id="choice_text_4">
        </div>

        <div class="form-group">
            <label for="correct_4" class="control-label">Is Correct</label>
            <input name="correct_4" type="hidden" value="0" id="correct_4">
            <input name="correct_4" type="checkbox" value="1" id="correct_4">
        </div>

        <button type="submit" class="btn btn-primary">Create Question</button>
    </form>

@endsection