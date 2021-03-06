<?php
require __DIR__ . "/vendor/autoload.php";

$target_dir = "uploads/";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$qrCodeText = NULL;

// Count how many files have been uploaded
$arr_length = count($_FILES["filesToUpload"]["name"]);

for($i=0; $i<$arr_length; $i++){
    $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["filesToUpload"]["tmp_name"][$i]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

//Check if image is a QRCode
    $qrcode = new Zxing\QrReader($_FILES["filesToUpload"]["tmp_name"][$i]);
    $text = $qrcode->text();
    if ($text == NULL){
        $isQRCode = false;
    }
    else {$isQRCode = true;
    $qrCodeText = $text;
    }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if ($isQRCode == false){
    $target_file = $target_dir . $qrCodeText . '_' . basename($_FILES["filesToUpload"]["name"][$i]);
    if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file)) {
        echo "The file ". basename( $_FILES["filesToUpload"]["name"][$i]). " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }}
}}
?>