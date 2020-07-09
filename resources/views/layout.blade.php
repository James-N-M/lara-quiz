<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/vendor/lara-quiz/img/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset(mix('app.css', 'vendor/lara-quiz')) }}" rel="stylesheet">

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