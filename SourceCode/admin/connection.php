<?php
$dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "u572700272_ecoplug";
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>