<?php

// Create connection

$conn = new mysqli(localhost, root, b, brunosite_local);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = mysqli_real_escape_string($conn, $_REQUEST['username']);


$sql=" SELECT * FROM Users where username = '$username'
";
$result = $conn->query($sql);

if ($result->num_rows > 0){
  $usernameErr ="username already exists";
  $username = "";
}else{
    $username = sanitize_text_field($_POST["email"]);

}
$conn->close();
 ?>
