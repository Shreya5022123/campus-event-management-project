<?php


include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $createpassword=$_POST['createpassword'];
    $confirmpassword=$_POST['confirmpassword'];
    $username=$_POST['username'];
     
    
    if($confirmpassword!==$createpassword){
        echo "<script>alert('created password does not match with confirm password.RETRY');
        window.location.href = 'register.html';</script>";
        exit;
    }
    else{

       $hashedPassword = password_hash($confirmpassword, PASSWORD_DEFAULT);
$sql = "INSERT INTO registration (email, password, username) VALUES ('$email', '$hashedPassword', '$username')";

         if($conn->query($sql)==TRUE){
       
            header("Location: login.html");
         }
         else{
            echo "ERROR".$sql."<br>".$conn->error;
         }
    }
    $conn->close();

}

?>