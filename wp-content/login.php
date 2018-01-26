<?php
//connect to database
session_start();
$conn = new mysqli(localhost, root, b, brunosite_local);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Check username and password
$username = mysqli_real_escape_string($conn, $_REQUEST['username']);
$pword = mysqli_real_escape_string($conn, $_REQUEST['pword']);

$sql=" SELECT * FROM Users WHERE `username` = '$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$hash = $row['password'];

if(password_verify($pword, $hash)){
  echo "create session";
  $_SESSION['login_user']=$username; // Initializing Session
  //header("location: index.php"); // Redirecting To Other Page
  		echo "
  	 <script language='JavaScript'>
  		window.location = '/home/index.php';
  	 </script>";
}else{
  $loginErr= "invalid username or password";
}
$conn->close();


 ?>
