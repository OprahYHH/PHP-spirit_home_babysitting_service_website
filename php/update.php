<?php
include 'header.php';
$_SESSION["title2"] = 'Update the information';
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
        if(!empty($_POST['fname'])) {
            $sql = "UPDATE $database.families F SET f_name = :fname WHERE F.f_id = :fid";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fid',$_POST['fid']);
            $stmt->bindParam(':fname',$_POST['fname']);
            $stmt->execute();
        } else if(!empty($_POST['faddress'])) {
            $sql = "UPDATE $database.families F SET f_address = :faddress WHERE F.f_id = :fid";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fid',$_POST['fid']);
            $stmt->bindParam(':faddress',$_POST['faddress']);
            $stmt->execute();
        } else if(!empty($_POST['femail'])) {
            $sql = "UPDATE $database.families F SET f_email = :femail WHERE F.f_id = :fid";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fid',$_POST['fid']);
            $stmt->bindParam(':femail',$_POST['femail']);
            $stmt->execute();
        } else if(!empty($_POST['fphone'])) {
            $sql = "UPDATE $database.families F SET f_phone = :fphone WHERE F.f_id = :fid";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fid',$_POST['fid']);
            $stmt->bindParam(':fphone',$_POST['fphone']);
            $stmt->execute();
        }

        echo "<p style='color:green'>Record Updated Successfully</p>";
    } catch(PDOException $err) {
        echo "<p style='color:#b81212'>Record Updated Failed: " . $err->getMessage() . "</p>";
    }

    unset($conn); //close
    echo "<a class='button' href='../update.html'>Back Update</a>";
    echo "<a class='button' href='../index.html'>Back Index</a>";
?>

<?php require 'footer.php'?>