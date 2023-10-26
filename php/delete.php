<?php
include 'header.php';
$_SESSION["title2"] = 'Delete A Record';
?>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "spirithome";
    $port = 3306;
    $mysqli = new mysqli("localhost",$username,$password,$database,$port);

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $err) {
        echo "<p style='color:#b81212'>Connection Failed: " . $err->getMessage() . "</p>";
    }

    try {
        $sql = "DELETE FROM families WHERE f_id = :fid;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fid',$_POST['fid']);
        $stmt->execute();

        echo "<br><b>Families ID: {$_POST['fid']}</b>";
        echo "<p style='color:green'>Record Deleted Successfully</p>";
    } catch(PDOException $err) {
        echo "<p style='color:#b81212'>Record Deleted Failed: " . $err->getMessage() . "</p>";
    }

    unset($conn); //close
    echo "<a class='button' href='../index.html'>Back Index</a>";
?>

<?php require 'footer.php'?>