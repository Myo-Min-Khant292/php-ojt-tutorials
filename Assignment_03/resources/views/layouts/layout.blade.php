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
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
            $(document).ready(function() {
                $('#show-form-btn').click(function() {
                    $('#import-form').toggle();
                });

                // Set number of rows per page
                // var rowsPerPage = 5;

                // // Initialize the table and pagination
                // var table = $('#table').DataTable({
                //     paging: true,
                //     lengthChange: false,
                //     pageLength: rowsPerPage
                // });

                // // Handle pagination click event
                // $('nav ul.pagination').on('click', 'a', function(event){
                //     event.preventDefault();

                //     // Get the page number from the clicked link
                //     var page = $(this).text();

                //     // Set the current page in the table
                //     table.page(page - 1).draw(false);
                // });
            }); 
	    </script>
    </body>
</html>