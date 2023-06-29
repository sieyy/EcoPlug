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

// Retrieve device information from the database
$sql = "SELECT * FROM devices";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>IoT Website</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
        }
        
        .device-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }
        
        .device-card {
            width: 300px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .device-card h2 {
            margin-top: 0;
        }
        
        .device-card p {
            margin-top: 10px;
        }
        
        .device-card .status {
            font-weight: bold;
        }
        
        .device-card form {
            margin-top: 20px;
        }
        
        .device-card button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .device-card button:hover {
            background-color: #45a049;
        }
    

         .device-container {
            margin-top: 40px;
        }

        .device-card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
        }

        .device-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .device-card .status {
            color: #ff5c5c;
        }
        /* CSS styles omitted for brevity */
    </style>
</head>
<body>
    <h1>IoT Devices</h1>
    <div class="device-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $deviceId = $row["id"];
                $deviceName = $row["name"];
                $status = $row["status"];
        ?>
                <div class="device-card">
                    <h2><?php echo $deviceName; ?></h2>
                    <p>Status: <span class="status"><?php echo ($status ? "ON" : "OFF"); ?></span></p>
                    <form action="control.php" method="post">
                        <input type="hidden" name="device_id" value="<?php echo $deviceId; ?>">
                        <input type="hidden" name="status" value="<?php echo ($status ? 0 : 1); ?>">
                        <button type="submit"><?php echo ($status ? "Turn Off" : "Turn On"); ?></button>
                    </form>
                </div>
        <?php
            }
        } else {
            echo "No devices found.";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
