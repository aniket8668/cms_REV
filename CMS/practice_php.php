<?php
// echo htmlspecialchars($_SERVER("PHP_SELF"));
// echo date("Y-M-D");
// date_default_timezone_get("India/Kolkata");

// connection
$db["server"] = 'localhost';
$db["username"] = 'root';
$db["password"] = '';
$db["name"] = 'DB';

foreach ($key as $db => $value) {
    define(strtoupper($key), $value);
}

$conn = mysqli_connect("SERVER", "USERNAME", "PASSWORD", "NAME");
if (mysqli_connect_errno()) {
    echo "NO CONMNECTION" . mysqli_connect_error();
    exit();
}

$sql = "CREATE DATABASE my_db";
$query = mysqli_query($conn, $sql);
if ($query) {
    echo "database created";
} else {
    echo "error creating database" . mysqli_error($conn);
}

$sql = "CREATE TABLE my_guests(
    id int(6) unsigned AUTO_INCREMENT PRIMARY KEY;
    firstname VARCHAR(30) NOT NULL;
    lastname  VARCHAR(30) NOT NULL;
    email  VARCHAR(50);
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

$insert_data = "INSERT INTO my_guests (firstname,lastname,email) VALUES ('Aniket','Adarsh','aniket@gmail.com')";
if (mysqli_query($conn, $insert_data)) {
    echo "data sucessfully submitted";
} else {
    echo "error submitting data!" . mysqli_error($conn);
}
mysqli_close($conn);

$last_id = mysqli_insert_id($conn);

$insert_data = "INSERT DATA INTO myguests (firstname,lastname,email) VALUES ('aniket','adarsh','adarsh@gmail.com')";
$insert_data.="INSERT DATA INTO myguests (firstname,lastname,email) VALUES ('mannish','dagar','manish@gmail.com')";
$insert_data.="INSERT DATA INTO myguests (firstname,lastname,email) VALUES ('mannish','dagar','manish@gmail.com')";
$insert_data.="INSERT DATA INTO myguests (firstname,lastname,email) VALUES ('mannish','dagar','manish@gmail.com')";
if(mysqli_multi_query($conn,$insert_data)){
    echo "data inserted sucessfully";
}else{
    echo "data submission unsucessful".mysqli_error($conn);
}

// prepared statement
$stmt =$conn->prepare("INSERT INTO myguests (firstname,lastname,email) VALUES('?','?','?')");
$stmt->bind_param("sss",$firstname,$lastname,$email);

$firstname="aniket";
$lastname="adarsh";
$email="aniket@gmail.com";
$stmt->execute();

$firstname="manish";
$lastname="dagar";
$email="manish@gmail.com";
$stmt->execute();

$stmt->close();
mysqli_close($conn);

$select_data ="SELECT id,firstname,lastname,email FROM myguests";
$query= mysqli_query($conn,$select_data);
if(mysqli_num_rows($query)>0){
    $firstname = $query['firstname'];
    $lastnametname = $query['lastname'];
    $email = $query['email'];
}else{
    echo "NO RESULT";
}

mysqli_close($conn);

$where = "SELECT firstname,lastname FROM my_guests WHERE lastname='adarsh'";
$order = "SELECT firstname,lastname,email FROM my_guests ORDER lastname DEC";
$delete = "DELETE FROM my_guests WHERE firstname = 'aniket'";
$update = "UPDATE mu_guests SET LASTNAME = 'adarshjjj' WHERE firstname='aniket'";

$limit ="SELECT * from my_guests LIMIT 10 OFFSET 15";
echo mktime(11,44,52,12,23,2020);

