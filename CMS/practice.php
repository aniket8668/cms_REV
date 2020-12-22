<?php
$x = 123.65;
is_string($x);
is_numeric($x);
is_infinite($x);
is_finite($x);
is_nan($x);
var_dump($x);

$y = (int)$x;
$z = (string)$x;

define($a, "ANIKET", true);
define("array", ['aniket', 'adarsh', 'udai', 'rashpa'], true);
function test_data($data){
    $final_data=stripslashes($data);
    $final_data=trim($data);
    $final_data=htmlspecialchars($data);
    return $final_data;
}

if($_SERVER["REQUEST_METHOD"]=="post"){
    $firstname = test_data('firstname');
    $lastname = test_data('lastname');
    $email = test_data('email');
}


echo date("Y-M-D");
echo mktime(12,33,56,12,31,2020);
date_default_timezone_get("America/Los_angeles");
include "includes/footer.php";
require "includes/footer.php";
require_once "includes/footer.php";

$sql ="CREATE DATABASE my_db";
if(mysqli_query($conn,$sql)){
    echo "database cxreated";
}else{
    echo "Database creation Unsucessful!".mysqli_error($conn);
}

mysqli_close($conn);

$sql = "CREATE TABLE myguests(
    id INT(6) unsigned AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(40),
    rerg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$query ="INSERT INTO myguests (firstname,lastname,email) VALUES ('aniket','adarsh','aniket@gmail.com')";
if(mysqli_query($conn,$query)){
    echo "data submitted sucessfully";
}else{
    echo "";
}


$last_id=mysqli_insert_id($conn);
$sql ="INSERT INTO myguests (firstname,lastname,email) VALUES ('aniket','adarsh','adarsh88aniket@gmail.com')";
$sql.="INSERT INTO myguests (firstname,lastname,email) VALUES ('aniket','adarsh','adarsh88aniket@gmail.com')";
$sql.="INSERT INTO myguests (firstname,lastname,email) VALUES ('aniket','adarsh','adarsh88aniket@gmail.com')";
if(mysqli_multi_query($conn,$sql)){
    echo "data sucessfully uploaded";
}else{
    echo "data not uploaded sucessfully".mysqli_error($conn);
}

$stmt = $conn-> prepare("INSERT INTO myguests (firstname,lastname,email) VALUES ('?','?','?')";
$stmt->bind_param("sss",$firstname,$lastname,$$email);


$firstname="aniket";
$lastname="adarsh";
$email="aniket@gmail.com";
$stmt->execute();

$firstname="udai";
$lastname="rashpa";
$email="rashpa_udai@gmail.com";
$stmt->execute();

$query ="SELECT * FROM myguests WHERE lastname = 'adarsh'";
$info = mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($info)){
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $email=$row['email'];
}
$sql = "SELECT * FROM myguests ORDER BY lastname DEC";
$sql="DELETE FROM myguests WHERE lastname='adarsh'";
$query="UPDATE myguests SET FIRSTNAME='SHANU' WHERE lastname='adarsh'";
$query ="SELECT * FROM myguests LIMIT 10 OFFSET 20";

$file="example.txt";
$handle= fopen($file,"r");
fclose($file);


$file = "example.txt";
if($handle=fopen($file,"r")){
    echo fread($file,filesize($file));
}else{
    echo "failed to open file";
}

?>

