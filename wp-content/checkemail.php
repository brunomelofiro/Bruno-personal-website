<?php

// Create connection

include "credentials.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);


$sql=" SELECT * FROM Users where email = '$email'
";
$result = $conn->query($sql);

if ($result->num_rows > 0){
  $emailErr ="this email is already in use";
  $email = "";
}
else{
  $email = sanitize_text_field($_POST["email"]);
}
$conn->close();
 ?>
