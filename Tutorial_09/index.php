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

    // print_r($lists);

    include("_dummy.php");

     // Check if the item deletion form is submitted
     if (isset($_POST['delete'])) {
        $idNo = $_POST['item_id'];
        $sql = "DELETE FROM lists WHERE id = $idNo";

        // run query
        mysqli_query($conn, $sql);

        // close connection
        mysqli_close($conn);

        // redirect back to the list page
        header("Location: index.php");
    }

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
    <a href="graph/_yearly.php" class="btn btn-primary graph">Graph</a>
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
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="form" method="POST">
                                    <input type='hidden' name='item_id' value='<?php echo $list['id']; ?>'>
                                    <a href="detail.php?id=<?php echo $list['id']; ?>" class="btn btn-primary view">View</a>
                                    <a href="edit.php?id=<?php echo $list['id']; ?>" class="btn btn-primary edit">Edit</a>
                                    <button type="submit" name="delete" class="btn btn-primary delete" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>                       
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>