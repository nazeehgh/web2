<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Handling</title>
</head>
<body>
    
<?php

$x = (string) "5";
// echo (string)5 + $x;
echo var_dump($x);

function add($a, $b) {
    return $a + $b;
}

echo add("5 apples", "10 bananas");
echo "<br><br>";


$var = '1';
if ($var == true) {
    echo "Equal\n";
} elseif ($var === true) {
    echo "Identical\n";
} else {
    echo "Not equal\n";
}
echo "<br><br>";


$student = 'Raghad';
echo '<b>Hello $student</b> ';
echo "<b>Hello $student</b>";
echo "<br><br>";


$x = 10;
echo 'The number is 5 + $x.';

echo "<br><br>";

$name = 'Linus';
print '<h1>Hello $name</h1>';
print "<h1>Hello " . $name . "</h1>";
echo "<br><br>";
# a single-line comment

$name = 'Razan';
$name = 'Diaa';
# $name = 'Ahmad';
function nFunction() {
  $name = 'Zaid';
}

echo "<br><br>";

nFunction();nFunction();nFunction();
echo $name ."/ ". $name ."/ " . $name;
echo "<br><br>";

function mFunction() {
    static $x = 0;
    $x++;
    echo $x;
}
mFunction();mFunction();mFunction();

echo "<br><br>";


$id = "abc";
echo "get($ID)";
echo "<br>";


echo 5 + "5";
$x = 10;
$y = "5";
echo $x + $y;

echo "<br><br>";

$myfile = fopen("file.txt", "r") or die("Unable to open file!");

// echo readfile("file.txt");
// echo fread($myfile,filesize("myfile.txt"));
// echo fread($myfile,20);
// echo fgets($myfile);
// echo "<br>";
fclose($myfile);

echo fgets(fopen("file.php", "r"));
echo fgets(fopen("file.php", "r"));
echo fgets(fopen("file.txt", "r+"));
echo fgets(fopen("file.php", "r"));


?>


</body>
</html>