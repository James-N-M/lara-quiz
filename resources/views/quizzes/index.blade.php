<h1>Showing all Posts</h1>
{{--<h1>This is actively updating</h1>--}}
@forelse ($quizzes as $quiz)
    <li>{{ $quiz->name }}</li>
@empty
    <p> no quizzes yet </p>
@endforelse