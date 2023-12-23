<?php
// Start the session
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();


header("Location: index.html");

}
?>