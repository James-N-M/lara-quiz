<h1>{{ $quiz->name }}</h1>

<form action="">
    @forelse ($quiz->questions as $question)
        <li>{{$question->question}}</li>
        @foreach($question->choices as $choice)
            <input type="radio" name="question[{{$question->id}}]" value="{{$choice->id}}">{{ $choice->choice }}<br>
        @endforeach
    @empty
        <p> no quiz questions yet </p>
    @endforelse
</form>
