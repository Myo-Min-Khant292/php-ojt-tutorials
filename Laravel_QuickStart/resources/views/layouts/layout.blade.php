<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Task</title>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body class="antialiased">
        @yield('content')       

        <script type="text/javascript" src="/js/bootstrap.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    </body>
</html>
