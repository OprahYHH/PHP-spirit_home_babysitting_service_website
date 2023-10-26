<?php
include 'header.php';
$_SESSION["title2"] = 'Create a database and a table';
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "";
$port = 3306;
$mysqli = new mysqli("localhost",$username,$password,$database,$port);

try {
    $conn = new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green'>Connection was successful</p>";
} catch(PDOException $err) {
    echo "<p style='color:#b81212'>Connection Failed: " . $err->getMessage() . "</p>";
}

try {
    $sql = "CREATE DATABASE spirithome";
    $conn->exec($sql);
    echo "<p style='color:green'>Database Created Successful</p>";
} catch (PDOException $err) {
    echo $sql . "<p style='color:#b81212'>" . $err->getMessage() . "</p>";
}

unset($conn); //close
echo "<a class='button' href='../index.html'>Back Index</a>";

?>

<?php require 'footer.php'?>