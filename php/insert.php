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
        $sql1 = "INSERT INTO $database.families (f_id,f_name,f_address,f_status,f_email,f_phone) 
        VALUES(DEFAULT,:fname,:faddress,:fstatus,:femail,:fphone);";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bindParam(':fname',$_POST['fname']);
        $stmt1->bindParam(':faddress',$_POST['faddress']);
        $stmt1->bindParam(':fstatus',$_POST['fstatus']);
        $stmt1->bindParam(':femail',$_POST['femail']);
        $stmt1->bindParam(':fphone',$_POST['fphone']);
        $stmt1->execute();

        echo "<p style='color:green'>Record Deleted Successfully</p>";
    } catch(PDOException $err) {
        echo "<p style='color:#b81212'>Record Deleted Failed: " . $err->getMessage() . "</p>";
    }

    unset($conn); //close
    echo "<a class='button' href='../insert.html'>Back Insert</a>";
    echo "<a class='button' href='../index.html'>Back Index</a>";
?>

<?php require 'footer.php'?>