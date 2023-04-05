<?php  
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Lists</title>
</head>
<body>

    <button class="create">Create</button>
    <div class="container test2">
        <div class="row justify-content-evenly gx-3">
            <h1>Post Lists</h1>
            <table class="table table-success table-striped list">
                 <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Is Published</th>
                        <th scope="col">Create Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>jlkgjsfoigjfdlm,gnml;fbhjjkdfnblkdhjsioghjfobijsfobhjorihbdfiohbojbnoidhsbiorhio</td>
                        <td>Is Published</td>
                        <td>4/4/2023</td>
                        <td>
                            <button class='view'>View</button>
                            <button class='edit'>Edit</button>
                            <button class='delete'>Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>