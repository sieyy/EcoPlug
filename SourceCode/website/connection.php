<?php
$dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "iot_website_db";
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>