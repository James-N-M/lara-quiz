<h1>Create a Quiz</h1>

<form method="POST" action="{{route('lara-quizzes.store')}}">
    <label for="name">Name</label>
    <input id="name" type="text" name="name">

    <label for="description">Description</label>
    <input id="description" type="text" name="description">
    <input type="submit" value="Submit">
</form>
