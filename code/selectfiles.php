<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="filesToUpload[]" multiple="multiple" id="filesToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>