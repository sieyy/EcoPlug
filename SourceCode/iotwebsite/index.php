<?php
// Connect to the database
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "iot_website_db";
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve device information from the database
$sql = "SELECT * FROM devices";
$result = $conn->query($sql);
// Insert sample devices into the database (you can modify this as per your requirements)
$devices = [
    ["name" => "Device 1", "status" => 1],
    ["name" => "Device 2", "status" => 0],
    ["name" => "Device 3", "status" => 1]
];

foreach ($devices as $device) {
    $deviceName = $device["name"];
    $deviceStatus = $device["status"];

    $sql = "INSERT INTO devices (name, status) VALUES ('$deviceName', '$deviceStatus')";
    if ($conn->query($sql) === false) {
        echo "Error inserting device: " . $conn->error;
    }
}


// Display device information
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Device ID: " . $row["id"] . "<br>";
        echo "Device Name: " . $row["name"] . "<br>";
        echo "Status: " . ($row["status"] ? "ON" : "OFF") . "<br>";
        echo "Last Updated: " . $row["timestamp"] . "<br><br>";
    }
} else {
    echo "No devices found.";
}

// Close the database connection
$conn->close();
?>
