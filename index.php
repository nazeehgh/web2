<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Development 2 - Main Page</title>
</head>
<body>

<?php include 'menu.php'; ?>


<h1>Wlecome to Web Development 2 Course</h1>
<h3>This is the main page</h3>

<a href='include.php'>File Include</a>
<a href='/ahmadsh/'>AhmadSH</a>

   <form action="page1.php" method="POST">
            Name: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            <input type="submit">
            <button>Click Here</button>
        
   </form> 

   <?php include 'footer.php'; ?>

</body>
</html>