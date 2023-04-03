<?php
    $errorBox = $success = $folderLocation = $img = $imgName = $imgSize = "";
    $imgType = $imgExt = $actualFileExt = $imgTemp = $fileDestination = $redBorder = "";
    $folderError = $imgError = "";

    if(isset($_POST['submit'])) {
        $imgFilter = $_FILES['image'];
        $folderFilter = $_POST['folder_name'];

        if(empty($folderFilter) && !is_uploaded_file($_FILES['image']['tmp_name'])) {
            $errorBox = "
                         <div class='alert alert-danger' role='alert'>
                            You need to put folder name and image
                        </div>
                        ";
            $redBorder = 'error2';
            $folderError = "<p class='error'>Form field is required</p>";
            $imgError = "<p class='error'>You need to insert image</p>";
        }else {
            if(empty($folderFilter)) {
                $errorBox = "
                             <div class='alert alert-danger' role='alert'>
                                You need to put folder name 
                            </div>
                            ";
                $redBorder = 'error2';
                $folderError = "<p class='error'>Form field is required</p>";
            }else {
                $folderLocation = $folderFilter; 
                if(!is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $errorBox = "
                                 <div class='alert alert-danger' role='alert'>
                                    You need to insert img file  
                                </div>
                                ";
                    $imgError = "<p class='error'>You need to insert image</p>";
                    $redBorder = 'error2';
                }else {
                    $imgName = $_FILES['image']['name'];
                    $imgTemp = $_FILES['image']['tmp_name'];
                    $imgSize = $_FILES['image']['size'];
                    $imgType = $_FILES['image']['type'];
                    $imgerror = $_FILES['image']['error'];
                    $imgExt = explode('.' , $imgName);
                    $actualFileExt = strtolower(end($imgExt));
                
                    if(!($actualFileExt == 'jpg' || $actualFileExt == 'jpeg' || $actualFileExt == 'img' || $actualFileExt == 'png')) {
                        $errorBox = "
                                 <div class='alert alert-danger' role='alert'>
                                    You can only insert img files  
                                </div>
                                ";
                        $redBorder = 'error2';
                        $imgError = "<p class='error'>You need to insert image</p>";
                    }elseif ($img > 2000) {
                        $errorBox = "
                                 <div class='alert alert-danger' role='alert'>
                                    Files is too large  
                                </div>
                                ";
                        $redBorder = 'error2';
                        $imgError = "<p class='error'>You need to insert image</p>";
                    }else {    
                        mkdir("images/$folderLocation");
                        $fileDestination = "images/$folderLocation/".$imgName;
                        if(file_exists("images/$folderLocation/$imgName")) {
                            $errorBox = "
                                        <div class='alert alert-danger' role='alert'>
                                            You need to change the image or folder name
                                        </div>
                                        ";
                            $redBorder = 'error2';
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