<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="viewevents.css">
</head>
<body>
    <h1>Your Events</h1>
 
    

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "SELECT * FROM event WHERE sr_no = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("i", $_SESSION['sr_no']);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        ?>
  <table border="2">
        <tr>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Event Time</th>
            <th>Event Venue</th>
            <th>Event Coordinator</th>
            <th>Event Budget</th>
        </tr>
        <?php


        while ($row = $result->fetch_assoc()) {
            $eventName = $row['eventName'];
            $eventDate = $row['eventDate'];
            $eventTime = $row['eventTime'];
            $eventVenue = $row['eventVenue'];
            $eventCoordinator = $row['eventCoordinator'];
            $eventBudget = $row['eventBudget']; 
?>
           <tr>
            <td><?php echo $eventName; ?></td>
            <td><?php echo $eventDate; ?></td>
            <td><?php echo $eventTime; ?></td>
            <td><?php echo $eventVenue; ?></td>
            <td><?php echo $eventCoordinator; ?></td>
            <td><?php echo $eventBudget; ?></td>
        </tr>
  <?php
      
    }
    } else {
        echo "No records found";
    }

    // Close the statement
    $stmt->close();
}
?>
</body>
</html>
