<?php

include("config.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: {$hostname}/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration form</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="indexStyle.css">
    </head>
<body>
<?php
echo "<h1>INDEX PAGE</h1>";
echo "<a href='logout.php'>logout</a>"; 
?>
</body>
</html>