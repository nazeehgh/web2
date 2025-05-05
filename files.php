<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Handling</title>
</head>
<body>
    
<?php
$myfile = fopen("myfile.txt", "r") or die("Unable to open file!");

// echo fread($myfile,filesize("myfile.txt"));
// echo fread($myfile,2);
echo fgets($myfile);
// echo "<br>";
echo fgets($myfile);
fclose($myfile);
?>


<!-- <?php 
$myfile = fopen("myfile.txt", "w");
echo $myfile;
fwrite($myfile, "This is my new line16.\n");
fwrite($myfile, "Line 16...\n");
fclose($myfile);

?> -->


</body>
</html>