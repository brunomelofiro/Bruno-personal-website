<?php
// Create connection


$conn = new mysqli(localhost, root, b, brunosite_local);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Escape user input for security
$firstname = mysqli_real_escape_string($conn, $_REQUEST['firstname']);
$middlename = mysqli_real_escape_string($conn, $_REQUEST['middlename']);
$lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname']);
$address1 = mysqli_real_escape_string($conn, $_REQUEST['address1']);
$address2 = mysqli_real_escape_string($conn, $_REQUEST['address2']);
$sta = mysqli_real_escape_string($conn, $_REQUEST['sta']);
$zip = mysqli_real_escape_string($conn, $_REQUEST['zip']);
$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
$unencrypted_pword = mysqli_real_escape_string($conn, $_REQUEST["pword"]);
$pword = password_hash($unencrypted_pword, PASSWORD_BCRYPT);


// sql to create table
$sql =
"CREATE TABLE IF not EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
middlename VARCHAR(30),
lastname VARCHAR(30) NOT NULL,
address1 VARCHAR(50) NOT NULL,
address2 VARCHAR(50),
state VARCHAR(2) NOT NULL,
zip VARCHAR(6) NOT NULL,
phone VARCHAR(11) NOT NULL,
email VARCHAR(50) NOT NULL,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully\r\n";
    $sql = "INSERT INTO Users(firstname, middlename, lastname, address1, address2, state, zip, phone, email, username, password)
    VALUES ('$firstname', '$middlename', '$lastname', '$address1', '$address2', '$sta', '$zip', '$phone', '$email', '$username', '$pword');";
}
if ($conn->query($sql) === TRUE) {
  echo "<hr>Stored information successfully";
}
 else {
    echo "Error: " . $conn->error;
}


$conn->close();
 ?>
