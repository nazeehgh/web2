<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="upload2.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="text" name="mytext">
  <input type="file" name="fileToUpload" id="fileToUpload">

  <input type="submit" value="Upload Image" name="submit">
</form>

<?php

echo time();
?>
</body>
</html>