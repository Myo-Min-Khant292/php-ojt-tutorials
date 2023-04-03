<?php
    include('libs/phpqrcode/qrlib.php');

    if(isset($_POST['submit'])) {
        $qrName = $_POST['QR_name'].".png";

        if(empty($qrName)) {
            $errorBox = "
                         <div class='alert alert-danger' role='alert'>
                            You need to put QR Name
                        </div>
                        ";
            $redBorder = 'error2';
            $qrError = "<p class='error'>QR field is required</p>";
            $imgError = "<p class='error'>You need to insert image</p>";
        }else {
            $tempDir = "images/";
            $pngAbsoluteFilePath = $tempDir.$qrName;
            $urlRelativeFilePath = $tempDir.$qrName;
            
            // generating
            if (!file_exists($pngAbsoluteFilePath)) {
                QRcode::png($qrName, $pngAbsoluteFilePath);
                $success = "
                            <div class='alert alert-primary' role='alert'>
                                File input successfully 
                            </div>
                            ";    
            }else {
                $errorBox = "
                            <div class='alert alert-danger' role='alert'>
                                That QR Name already exits
                            </div>
                            ";
            }
            // echo $pngAbsoluteFilePath;
            // echo '<img src="'.$urlRelativeFilePath.'" />';
        }
    }

?>