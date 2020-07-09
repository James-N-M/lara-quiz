<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/lara-quiz/app.css') }}">

    <title>Lara Quiz Master App Layout</title>
</head>
<!-- TODO must include publish views when installing package -->
<!-- Master App Layout -->
<body>
    <div class="container">
        @yield('content')
    </div>
<script>
    console.log("in lara quiz package layouts this is working");
</script>
</body>
</html>