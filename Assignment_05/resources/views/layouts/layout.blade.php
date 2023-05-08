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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body class="antialiased">
        <div class="header">
            <a href="#" class="auth auth1">Register</a>
            <a href="#" class="auth auth2">Login</a>grteeidijlsdkfjlsdfjsd
            <div class="header-nav clearfix">
                <h2>NavBar</h2>
                <a href="{{route('major#index')}}">Majors</a>
                <a href="{{route('student#index')}}">Students</a>
            </div>
        </div>
        @yield('content');

        <script type="text/javascript" src="/js/bootstrap.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
            $(document).ready(function() {
                $('#show-form-btn').click(function() {
                    $('#import-form').toggle();
                });
            }); 
	    </script>
    </body>
</html>