<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "u572700272_ecoplug";
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update device status in the database
    $deviceId = $_POST["device_id"];
    $newStatus = $_POST["status"];
    $sql = "UPDATE devices SET status = '$newStatus' WHERE id = '$deviceId'";
    if ($conn->query($sql) === true) {
        echo "Device status updated successfully.";
    } else {
        echo "Error updating device status: " . $conn->error;
    }
    header("Location: device.php?notif=$newStatus");

    // Close the database connection
    $conn->close();
}
?>
