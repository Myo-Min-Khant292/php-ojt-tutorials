<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    
    include("db.php");

    // write query for all lists
    $sql = "SELECT id , title , content , published , created_date FROM lists ORDER BY id";
    
    // make query & get results
    $results = mysqli_query($conn , $sql);

    // fetch the resulting row as an array
    $lists = mysqli_fetch_all($results , MYSQLI_ASSOC);

    // free results from memory
    mysqli_free_result($results);

    // close connection
    mysqli_close($conn);
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
    <a href="create.php" class="btn btn-primary create">Create</a>
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
                    <?php foreach($lists as $list) : ?>
                        <tr>
                            <th scope="row"><?php echo $list['id'] ?></th>
                            <td><?php echo $list['title'] ?></td>
                            <td><?php echo substr($list['content'] , 0 , 50) . "..." ?></td>
                            <td><?php echo $list['published'] ?></td>
                            <td>
                                <?php
                                    echo date('Y-m-d', strtotime($list['created_date']));
                                ?>
                            </td>
                            <td>
                                <a href="detail.php?id=<?php echo $list['id']; ?>" class="btn btn-primary view">View</a>
                                <a href="edit.php?id=<?php echo $list['id']; ?>" class="btn btn-primary edit">Edit</a>
                                <a onclick="confirmDelete(<?php echo $list['id'];?>)" href="#" class="btn btn-primary delete">Delete</a>
                            </td>                       
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this item?")) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
</body>
</html>