<?php
session_start();
//User ID
$userID = $_SESSION['userID'];
$userName=$userNumber=$userEmail=$userPassword="";


//Connection to Database
$dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "u572700272_ecoplug";
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$res = $conn->query("SELECT * from users WHERE ID = '$userID'");
$row = $res->fetch_array();
$userName = $row['Name'];
$userNumber = $row['Phone'];
$userEmail = $row['Email'];
$userPassword = $row['Password'];
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Ecoplug - User
  </title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $deviceName = $_POST['device_name'];
    $energyConsumption = $_POST['energy_consumption'];
    
    // Save the data to a database or perform further processing
    // Here, we'll just display the data for demonstration purposes
    echo "<h2>Device Name:</h2><p>$deviceName</p>";
    echo "<h2>Energy Consumption:</h2><p>$energyConsumption kWh</p>";
}
?>
