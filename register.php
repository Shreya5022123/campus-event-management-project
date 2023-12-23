<?php


include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $createpassword=$_POST['createpassword'];
    $confirmpassword=$_POST['confirmpassword'];
    $username=$_POST['username'];
     
    
    if($confirmpassword!==$createpassword){
        echo "created password does not match with confirm password. <BR> RETRY";
        exit;
    }
    else{

       $hashedPassword = password_hash($confirmpassword, PASSWORD_DEFAULT);
$sql = "INSERT INTO registration (email, password, username) VALUES ('$email', '$hashedPassword', '$username')";

         if($conn->query($sql)==TRUE){
            echo "data inserted succesfully";
            
            header("Location: login.html");
         }
         else{
            echo "ERROR".$sql."<br>".$conn->error;
         }
    }
    $conn->close();

}

?>