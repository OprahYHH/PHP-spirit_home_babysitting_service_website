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

$table_f = "USE $database;
INSERT INTO spirithome.families (F_id, F_Name, F_Address, F_Status, F_Email, F_Phone)
VALUES (default,'Mary Adam','1240 Cambie rd, Richmond','Married','mary1240@gmail.com','604-122-4421');
INSERT INTO spirithome.families (F_id, F_Name, F_Address, F_Status, F_Email, F_Phone)
VALUES (default,'Jane Black','5910 Main st, Vancouver','Single Parent','jane1200@gmail.com','604-999-1233');
INSERT INTO spirithome.families (F_id, F_Name, F_Address, F_Status, F_Email, F_Phone)
VALUES (default,'Daivd Yany','4122 Knight st, Vancouver','Divorced','yangdd@gmail.com','236-999-1122');
INSERT INTO spirithome.families (F_id, F_Name, F_Address, F_Status, F_Email, F_Phone)
VALUES (default,'Andrew Fuller','30070 HUNTINGDON Rd, ABBOTSFORD','Single Parent','fuller@gmail.com','708-123-1111');
INSERT INTO spirithome.families (F_id, F_Name, F_Address, F_Status, F_Email, F_Phone)
VALUES (default,'Margaret Peacock','4775 SPRING RD, SAANICH','Married','peacock@gmail.com','708-444-5555');
INSERT INTO spirithome.families (F_id, F_Name, F_Address, F_Status, F_Email, F_Phone)
VALUES (default,'Laura Callahan','1648 MORNINGSIDE PL, SAANICH','Married','laura@gmail.com','708-000-1111');

INSERT INTO spirithome.child_families (F_ID, C_Name, C_Gender, C_BirthDate)
VALUES (1,'Peter','male','2022-02-01');
INSERT INTO spirithome.child_families (F_ID, C_Name, C_Gender, C_BirthDate)
VALUES (2,'Jane','female','2022-02-01');
INSERT INTO spirithome.child_families (F_ID, C_Name, C_Gender, C_BirthDate)
VALUES (3,'Will','male','2019-05-03');
INSERT INTO child_families (F_ID, C_Name, C_Gender, C_BirthDate)
VALUES (4,'Nancy','female','2021-12-08');
INSERT INTO child_families (F_ID, C_Name, C_Gender, C_BirthDate)
VALUES (5,'Michael','male','2019-07-02');
INSERT INTO child_families (F_ID, C_Name, C_Gender, C_BirthDate)
VALUES (6,'Anne','female','2018-09-10');

INSERT INTO spirithome.child_families_language (f_id, c_name, c_language)
VALUES (1,'Peter','English');
INSERT INTO spirithome.child_families_language (f_id, c_name, c_language)
VALUES (2,'Jane','English');
INSERT INTO spirithome.child_families_language (f_id, c_name, c_language)
VALUES (3,'Will','Chinese');
INSERT INTO spirithome.child_families_language (f_id, c_name, c_language)
VALUES (3,'Will','English');
INSERT INTO child_families_language (f_id, c_name, c_language)
VALUES (4,'Nancy','English');
INSERT INTO child_families_language (f_id, c_name, c_language)
VALUES (4,'Nancy','Spanish');
INSERT INTO child_families_language (f_id, c_name, c_language)
VALUES (5,'Michael','English');
INSERT INTO child_families_language (f_id, c_name, c_language)
VALUES (6,'Anne','Hindi');
INSERT INTO child_families_language (f_id, c_name, c_language)
VALUES (6,'Anne','English');

INSERT INTO spirithome.child_families_disability (f_id, c_name, c_disability)
VALUES (1,'Peter','Learning disabilities');
INSERT INTO spirithome.child_families_disability (f_id, c_name, c_disability)
VALUES (2,'Jane','Learning disabilities');
INSERT INTO spirithome.child_families_disability (f_id, c_name, c_disability)
VALUES (3,'Will','Deaf of hearing');
INSERT INTO spirithome.child_families_disability (f_id, c_name, c_disability)
VALUES (3,'Will','Psychiatric disabilities');
INSERT INTO spirithome.child_families_disability (f_id, c_name, c_disability)
VALUES (4,'Nancy','Psychiatric disabilities');
INSERT INTO spirithome.child_families_disability (f_id, c_name, c_disability)
VALUES (5,'Michael','null');
INSERT INTO spirithome.child_families_disability (f_id, c_name, c_disability)
VALUES (6,'Anne','null');
";

$table_b = "USE $database;
INSERT INTO spirithome.babysitters (ssn, b_education, b_gender, b_name, b_birthdate, b_nationality, b_occupation)
VALUES (78051120,'Diploma','female','Oliver','1980-09-05','Canadian','Teacher');
INSERT INTO spirithome.babysitters (ssn, b_education, b_gender, b_name, b_birthdate, b_nationality, b_occupation)
VALUES (78102232,'PhD','male','James','1975-12-23','Non-Canadian',null);
INSERT INTO spirithome.babysitters (ssn, b_education, b_gender, b_name, b_birthdate, b_nationality, b_occupation)
VALUES (78014421,'Master Degree','female','Noah','1970-08-16','Canadian','Writer');
INSERT INTO spirithome.babysitters (ssn, b_education, b_gender, b_name, b_birthdate, b_nationality, b_occupation)
VALUES (78320442,'Bachelor','female','Mary','1985-12-11','Canadian','Teacher');
INSERT INTO spirithome.babysitters (ssn, b_education, b_gender, b_name, b_birthdate, b_nationality, b_occupation)
VALUES (78114003,'Diploma','male','George','1989-03-18','Canadian','Cooker');
INSERT INTO spirithome.babysitters (ssn, b_education, b_gender, b_name, b_birthdate, b_nationality, b_occupation)
VALUES (78778779,'Bachelor','female','Lilly','1990-04-21','Canadian','null');

INSERT INTO spirithome.babysitters_skill (ssn, b_skill)
VALUES (78051120,'Communication');
INSERT INTO spirithome.babysitters_skill (ssn, b_skill)
VALUES (78102232,'Patience');
INSERT INTO spirithome.babysitters_skill (ssn, b_skill)
VALUES (78014421,'Experience');
INSERT INTO spirithome.babysitters_skill (ssn, b_skill)
VALUES (78014421,'Communication');
INSERT INTO spirithome.babysitters_skill (ssn, b_skill)
VALUES (78102232,'History');
INSERT INTO spirithome.babysitters_skill (ssn, b_skill)
VALUES (78320442,'Patience');
INSERT INTO spirithome.babysitters_skill (ssn, b_skill)
VALUES (78114003,'Painting');
INSERT INTO spirithome.babysitters_skill (ssn, b_skill)
VALUES (78778779,'Communication');

INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78051120,'English');
INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78051120,'French');
INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78102232,'English');
INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78102232,'Chinese');
INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78014421,'English');
INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78014421,'French');
INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78114003,'English');
INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78102232,'English');
INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78102232,'Hindi');
INSERT INTO spirithome.babysitters_language (ssn, b_language)
VALUES (78778779,'English');
";

$table_c = "USE $database;
INSERT INTO spirithome.contract (ct_id, f_id, ssn)
VALUES (1,1,78014421);
INSERT INTO spirithome.contract (ct_id, f_id, ssn)
VALUES (2,2,78102232);
INSERT INTO spirithome.contract (ct_id, f_id, ssn)
VALUES (3,3,78051120);
INSERT INTO spirithome.contract (ct_id, f_id, ssn)
VALUES (4,6,78102232);
INSERT INTO spirithome.contract (ct_id, f_id, ssn)
VALUES (5,4,78778779);
INSERT INTO spirithome.contract (ct_id, f_id, ssn)
VALUES (6,5,78114003);

INSERT INTO spirithome.contract_schedule (ct_id, schedule, start_date, end_date, ct_perhours, ct_dayamounts)
VALUES (1,'9:00-16:00','2022-02-02','2023-02-02',18.5,129.5);
INSERT INTO spirithome.contract_schedule (ct_id, schedule, start_date, end_date, ct_perhours, ct_dayamounts)
VALUES (2,'10:00-15:00','2022-02-02','2023-12-02',16.5,82.5);
INSERT INTO spirithome.contract_schedule (ct_id, schedule, start_date, end_date, ct_perhours, ct_dayamounts)
VALUES (3,'7:00-12:00','2022-05-04','2022-12-22',21,105);
INSERT INTO spirithome.contract_schedule (ct_id, schedule, start_date, end_date, ct_perhours, ct_dayamounts)
VALUES (3,'13:00-18:00','2022-03-04','2023-12-31',19.5,97.5);
INSERT INTO spirithome.contract_schedule (ct_id, schedule, start_date, end_date, ct_perhours, ct_dayamounts)
VALUES (4,'12:00-20:00','2022-01-01','2023-12-31',20.5,164);
INSERT INTO spirithome.contract_schedule (ct_id, schedule, start_date, end_date, ct_perhours, ct_dayamounts)
VALUES (5,'15:00-22:00','2022-03-13','2022-12-31',21.5,107.5);
INSERT INTO spirithome.contract_schedule (ct_id, schedule, start_date, end_date, ct_perhours, ct_dayamounts)
VALUES (6,'19:00-23:00','2022-01-05','2022-05-31',23,92);

INSERT INTO spirithome.contract_schedule_service (ct_id, schedule, service)
VALUES (1,'9:00-16:00','Painting');
INSERT INTO spirithome.contract_schedule_service (ct_id, schedule, service)
VALUES (2,'10:00-15:00','English learning');
INSERT INTO spirithome.contract_schedule_service (ct_id, schedule, service)
VALUES (3,'7:00-12:00','Dance');
INSERT INTO spirithome.contract_schedule_service (ct_id, schedule, service)
VALUES (3,'13:00-18:00','Painting');
INSERT INTO spirithome.contract_schedule_service (ct_id, schedule, service)
VALUES (4,'12:00-20:00','Movie');
INSERT INTO spirithome.contract_schedule_service (ct_id, schedule, service)
VALUES (5,'15:00-22:00','Language');
INSERT INTO spirithome.contract_schedule_service (ct_id, schedule, service)
VALUES (6,'19:00-23:00','History');
";

try {
    $conn->exec($table_f);
//    $conn->exec($table_b);
//    $conn->exec($table_c);
    echo "<p style='color:green'>Data Inserted Successfully</p>";
} catch (PDOException $err) {
    echo $sql . "<p style='color:#b81212'>" . $err->getMessage() . "</p>";
}

unset($conn); //close
echo "<a class='button' href='../index.html'>Back Index</a>";

?>

<?php require 'footer.php'?>