<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <title>Document</title>
    <script src="https://kit.fontawesome.com/73f1a404f3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    @stack('css')
    
</head>

<body>
    @yield('content')
</body>


</html>

