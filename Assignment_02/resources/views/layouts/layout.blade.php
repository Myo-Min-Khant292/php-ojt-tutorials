<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/reset.css">
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body class="antialiased">
        <div class="header">
            <div class="header-nav clearfix">
                <h2>NavBar</h2>
                <a href="{{route('major.index')}}">Majors</a>
                <a href="{{route('student.index')}}">Students</a>
            </div>
        </div>
        @yield('content');

        <script type="text/javascript" src="/js/bootstrap.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script>
            $(document).ready(function() {
                $('#show-form-btn').click(function() {
                    $('#import-form').toggle();
                });
            });
	    </script>
    </body>
</html>