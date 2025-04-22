<html>
<body>

<?php
function checkRequestType(){
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        echo "Hello There, how are you " . $_GET["name"] . "<br>";
        echo "Is this really your email address " . $_GET["email"] . "<br>";
    }else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Name: " . $_POST["name"] . "<br>";
        echo "Email: " . $_POST["email"] . "<br>";
    }
}

checkRequestType();
?>

</body>
</html>

