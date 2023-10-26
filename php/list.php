<?php
include 'header.php';
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

$_SESSION["title2"] = 'Current Families and Children';

try {
    echo "<p>The current families in the database:</p>";

    $sql = "SELECT * FROM $database.families;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch();
    if ($row) {
        echo <<<HTML
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
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>{$row[3]}</td>
                <td>{$row[4]}</td>
                <td>{$row[5]}</td>
            </tr>
            HTML;
        } while ($row = $stmt->fetch());
        echo "</tbody></table><br>";
    } else {
        echo "<p>No data record in the database.</p>";
    }
} catch(PDOException $err) {
    echo "<p style='color:#b81212'>Record Retrieval Failed: " . $err->getMessage() . "</p>";
}

unset($conn); //close
echo "<a class='button' href='../index.html'>Back Index</a>";
?>

<?php require 'footer.php'?>