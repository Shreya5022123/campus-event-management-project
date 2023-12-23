<?php
include 'db.php';
  session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT sr_no,username, password FROM registration WHERE username = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Bind the result to variables
    $stmt->bind_result($sr_no,$dbUsername, $dbPassword);

    // Fetch the result
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    // Verify the password using password_verify
    if (!empty($dbPassword) && password_verify($password, $dbPassword)) {
        
        
        // Store user information in the session
       
        $_SESSION['sr_no'] = $sr_no;
      
       // Display an alert
       echo '<script>
       alert("Login successful.");
       window.location.href = "addevents.html";
       </script>';
    
        
        exit();
    } else {
        // Display an error message
        $error = "Invalid username or password. Please try again.";
        echo $error;
        echo '<script>alert("Login failed")</script>';
    }
}
?>