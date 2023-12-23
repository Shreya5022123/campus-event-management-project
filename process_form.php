<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $sr_no=$_SESSION['sr_no'];
    $eventName = $_POST["eventName"];
    $eventDate = $_POST["eventDate"];
    $eventTime = $_POST["eventTime"];
    $eventVenue = $_POST["eventVenue"];
    $eventCoordinator = $_POST["eventCoordinator"];
    $eventBudget = $_POST["eventBudget"];

   
    // Prepare and execute SQL query to insert data into an 'events' table
    $sql = "INSERT INTO event ( eventName, eventDate, eventTime, eventVenue, eventCoordinator, eventBudget,sr_no) VALUES (?, ?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $eventName, $eventDate, $eventTime, $eventVenue, $eventCoordinator, $eventBudget,$sr_no);

    if ($stmt->execute()) {
        echo '<script>
        alert("Event data inserted successfully!");
        window.location.href="addevents.html";
        
        </script>';


    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect or display an error message if the form is not submitted
    echo "Form submission error.";
}

?>



