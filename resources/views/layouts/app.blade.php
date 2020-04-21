<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Lara Quiz</title>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
<script>
    console.log("this is working");
</script>
</body>
</html>