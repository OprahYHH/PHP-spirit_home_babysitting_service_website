<?php
include 'header.php';
$_SESSION["title2"] = 'Search the data';
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
        $sql1 = "SELECT * FROM $database.families WHERE f_name LIKE '$_POST[fstart]%'";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        $row1 = $stmt1->fetch();

        $sql3 = "SELECT * FROM $database.families WHERE f_status = '$_POST[fstatus]'";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute();
        $row3 = $stmt3->fetch();

        if(!empty($_POST['fstart'])) {
            if($row1) {
                echo <<<HTML
                <p>Families name start with <b>{$_POST['fstart']}</b></p>
                <table class="list">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Full Name</td>
                            <td>Address</td>
                            <td>Status</td>
                            <td>Email</td>
                            <td>Phone Number</td>
                        </tr>
                    </thead>
                    <tbody>
                HTML;
                do {
                    echo <<<HTML
                <tr>
                    <td>{$row1[0]}</td>
                    <td>{$row1[1]}</td>
                    <td>{$row1[2]}</td>
                    <td>{$row1[3]}</td>
                    <td>{$row1[4]}</td>
                    <td>{$row1[5]}</td>
                </tr>
                HTML;
                } while($row1 = $stmt1->fetch());
                echo "</tbody></table><br>";
            } else {
                echo"<p>Cannot Found Any Record!</p>";
            }
        } else if(!empty($_POST['fstatus'])) {
            if($row3) {
                echo <<<HTML
                <p>Family status with keyword <b>{$_POST['fstatus']}</b></p>
                <table class="list">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Full Name</td>
                            <td>Address</td>
                            <td>Status</td>
                            <td>Email</td>
                            <td>Phone Number</td>
                        </tr>
                    </thead>
                    <tbody>
                HTML;
                do {
                    echo <<<HTML
                <tr>
                    <td>{$row3[0]}</td>
                    <td>{$row3[1]}</td>
                    <td>{$row3[2]}</td>
                    <td>{$row3[3]}</td>
                    <td>{$row3[4]}</td>
                    <td>{$row3[5]}</td>
                </tr>
                HTML;
                } while($row3 = $stmt3->fetch());
                echo "</tbody></table><br>";
            } else {
                echo"<p>Cannot Found Any Record!</p>";
            }
        }
    } catch(PDOException $err) {
        echo "<p style='color:#b81212'>Record Deleted Failed: " . $err->getMessage() . "</p>";
    }

    unset($conn); //close
    echo "<a class='button' href='../search.html'>Back Search</a>";
    echo "<a class='button' href='../index.html'>Back Index</a>";
?>

<?php require 'footer.php'?>