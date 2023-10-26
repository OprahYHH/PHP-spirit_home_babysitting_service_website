<?php
include 'header.php';
$_SESSION["title2"] = 'Create a database and a table';
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "spirithome";
$port = 3306;
$mysqli = new mysqli("localhost",$username,$password,$database,$port);

try {
    $conn = new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green'>Connection was successful</p>";
} catch(PDOException $err) {
    echo "<p style='color:#b81212'>Connection Failed: " . $err->getMessage() . "</p>";
}

$sql2 = "USE $database;
        CREATE TABLE spirithome.families (
            F_id INT(6) PRIMARY KEY AUTO_INCREMENT,
            F_Name VARCHAR(20) NOT NULL,
            F_Address VARCHAR(100) NOT NULL,
            F_Status VARCHAR(20) NOT NULL,
            F_Email VARCHAR(25) NOT NULL UNIQUE,
            F_Phone VARCHAR(20)
        )ENGINE = InnoDB;
        CREATE TABLE spirithome.child_Families (
            F_ID INT(6),
            C_Name VARCHAR(20) NOT NULL,
            C_Gender CHAR(10),
            C_BirthDate DATE NOT NULL,
            PRIMARY KEY (F_ID, C_Name),
            FOREIGN KEY (F_ID) REFERENCES families(F_ID) ON DELETE CASCADE
        )ENGINE = InnoDB ;
        CREATE TABLE spirithome.child_families_language (
          F_ID  INT(6),
          C_Name  VARCHAR(20)  NOT NULL,
          C_Language    VARCHAR(20)  NOT NULL,
          PRIMARY KEY  (F_ID, C_Name, C_Language),
          FOREIGN KEY  (F_ID, C_Name) REFERENCES Child_families(F_ID, C_Name) ON DELETE CASCADE
        )ENGINE = InnoDB ;
        CREATE TABLE spirithome.child_families_disability (
          F_ID  INT(6),
          C_Name  VARCHAR(20)  NOT NULL,
          C_Disability    VARCHAR(50),
          PRIMARY KEY  (F_ID, C_Name, C_Disability),
          FOREIGN KEY  (F_ID, C_Name) REFERENCES child_families(F_ID, C_Name)  ON DELETE CASCADE
        )ENGINE = InnoDB ;
        CREATE TABLE spirithome.babysitters (
          SSN  INT(15)  PRIMARY KEY,
          B_Education  VARCHAR(100),
          B_Gender  CHAR(10) NOT NULL,
          B_Name  VARCHAR(20) NOT NULL,
          B_BirthDate  Date  NOT NULL,
          B_Nationality  VARCHAR(20) NOT NULL,
          B_Occupation VARCHAR(20)  NULL
        )ENGINE = InnoDB ;
        CREATE TABLE spirithome.babysitters_skill (
          SSN  INT(10),
          B_Skill  VARCHAR(20),
          PRIMARY KEY (SSN, B_Skill),
          FOREIGN KEY (SSN) REFERENCES babysitters(SSN) ON DELETE CASCADE
        )ENGINE = InnoDB ;
        CREATE TABLE spirithome.babysitters_Language (
          SSN  INT(10),
          B_Language  VARCHAR(20),
          PRIMARY KEY (SSN, B_Language),
          FOREIGN KEY (SSN) REFERENCES babysitters(SSN) ON DELETE CASCADE
        )ENGINE = InnoDB ;
        CREATE TABLE spirithome.contract (
          CT_ID  INT(6)   PRIMARY KEY,
          F_ID  INT(6),
          SSN  INT(10),
          FOREIGN KEY (F_ID) REFERENCES Families(F_ID) ON DELETE CASCADE,
          FOREIGN KEY (SSN) REFERENCES babysitters(SSN) ON DELETE CASCADE
        )ENGINE = InnoDB ;
        CREATE TABLE spirithome.contract_schedule (
          CT_ID  INT(6),
          Schedule  VARCHAR(100),
          Start_Date  DATE  NOT NULL,
          End_Date  DATE  NOT NULL,
          CT_Price FLOAT,
          PRIMARY KEY (CT_ID, Schedule),
          FOREIGN KEY (CT_ID) REFERENCES Contract(CT_ID) ON DELETE CASCADE
        )ENGINE = InnoDB ;
        CREATE TABLE spirithome.contract_schedule_service (
          CT_ID  INT(6),
          Schedule  VARCHAR(100),
          Service  VARCHAR(200),
          PRIMARY KEY (CT_ID, Schedule, Service),
          FOREIGN KEY (CT_ID, Schedule) REFERENCES contract_schedule(CT_ID, Schedule) ON DELETE CASCADE
        )ENGINE = InnoDB ;
    ";

try {
    $conn->exec($sql2);
    echo "<p style='color:green'>Table Created Successfully</p>";
} catch (PDOException $err) {
    echo $sql . "<p style='color:#b81212'>" . $err->getMessage() . "</p>";
}

unset($conn); //close
echo "<a class='button' href='../index.html'>Back Index</a>";

?>

<?php require 'footer.php'?>