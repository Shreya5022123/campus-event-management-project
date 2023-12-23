<?php
//connection
$host='localhost';
$user='root';
$password='';
$database='cems';
$conn=new mysqli($host,$user,$password,$database);
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
// else{
//     echo "connection succcessful!";
// }
?>