<?php
    include('libs/phpqrcode/qrlib.php');

    if(isset($_POST['submit'])) {
        $qrName = $_POST['QR_name'];

        if(empty($qrName)) {
            $redBorder = 'error2';
            $qrError = "<p class='error'>QR field is required</p>";
        }else {
            $tempDir = "images/";
            $pngAbsoluteFilePath = $tempDir.$qrName;
            $urlRelativeFilePath = $tempDir.$qrName;
            $qrName = $_POST['QR_name'].".png";
            
            // generating
            if (!file_exists($pngAbsoluteFilePath)) {
                QRcode::png($qrName, $pngAbsoluteFilePath);
                $success = "
                            <div class='alert alert-primary' role='alert'>
                                File input successfully 
                            </div>
                            ";
                $imageStyle = 'new-qr';    
            }else {
                $qrError = "<p class='error'>QR Name already exits</p>";
            }
        }
    }

?>