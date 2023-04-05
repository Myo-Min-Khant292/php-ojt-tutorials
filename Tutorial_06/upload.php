<?php
    $errorBox = $success = $folderLocation = $img = $imgName = $imgSize = "";
    $imgType = $imgExt = $actualFileExt = $imgTemp = $fileDestination = $redBorder = "";
    $folderError = $imgError = "";

    if(isset($_POST['submit'])) {
        $imgFilter = $_FILES['image'];
        $folderFilter = $_POST['folder_name'];

        if(empty($folderFilter) && !is_uploaded_file($_FILES['image']['tmp_name'])) {
            $redtBorder = 'error2';
            $redbBorder = 'error2';
            $folderError = "<p class='error'>Form field is required</p>";
            $imgError = "<p class='error'>You need to insert image</p>";
        }else {
            if(empty($folderFilter)) {
                $redtBorder = 'error2';
                $folderError = "<p class='error'>Form field is required</p>";
            }else {
                $folderLocation = $folderFilter; 
                if(!is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $imgError = "<p class='error'>You need to insert image</p>";
                    $redbBorder = 'error2';
                }else {
                    $imgName = $_FILES['image']['name'];
                    $imgTemp = $_FILES['image']['tmp_name'];
                    $imgSize = $_FILES['image']['size'];
                    $imgType = $_FILES['image']['type'];
                    $imgerror = $_FILES['image']['error'];
                    $imgExt = explode('.' , $imgName);
                    $actualFileExt = strtolower(end($imgExt));
                
                    if(!($actualFileExt == 'jpg' || $actualFileExt == 'jpeg' || $actualFileExt == 'img' || $actualFileExt == 'png')) {
                        $redbBorder = 'error2';
                        $imgError = "<p class='error'>You can only inset img format</p>";
                    }elseif ($imgSize > 2000) {
                        $redbBorder = 'error2';
                        $imgError = "<p class='error'>Image size should not be more than 2000</p>";
                    }else {    
                        mkdir("images/$folderLocation");
                        $fileDestination = "images/$folderLocation/".$imgName;
                        if(file_exists("images/$folderLocation/$imgName")) {
                            $redbBorder = 'error2';
                            $imgError = "<p class='error'>You need to change image or folder name</p>";
                        }else {
                            move_uploaded_file($imgTemp , $fileDestination);
                            $success = "
                                        <div class='alert alert-primary' role='alert'>
                                            File input successfully 
                                        </div>
                                        ";
                            header("index.php");
                        }  
                    }
                }   
            }
            
             
        }
    }
?>