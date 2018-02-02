<?php

include "credentials.php";
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();//starting session_start

//Storing session
$user_check =$_SESSION['login_user'];



//SQL query to fetch complete information of user_check
$sql="SELECT * from `Users` where username = '$user_check';";

$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$firstname_session = $row['firstname'];
$lastname_session = $row['lastname'];


if(!isset($firstname_session)){
$conn->close(); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}

 ?>
