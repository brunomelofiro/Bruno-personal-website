<?php
session_start();
file_put_contents("./chatbox/log.html", "");
if(session_destroy()) // Destroying All Sessions
{

header("Location: /log-in"); // Redirecting To Home Page
}
?>
