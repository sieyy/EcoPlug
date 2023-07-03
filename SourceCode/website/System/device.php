<!--

=========================================================
* Argon Dashboard - v1.1.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<?php 

?>
<!DOCTYPE html>
<html lang="en">

<?php require_once 'process.php'; ?>
<style type="text/css">
    /* Add your CSS styles here */
        
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
<body class="">
  <?php 
    if (isset($_GET['delID'])) {
        # code...
        $delID = $_GET['delID'];
        $result = $conn->query("DELETE from devices WHERE id = '$delID'");
        echo "<script type='text/javascript'>
                Swal.fire('Success!', 'Device is now removed', 'success');
                </script>";
    }

    // Retrieve device information from the database
$sql = "SELECT * FROM devices WHERE User_ID = '$userID'";
$result = $conn->query($sql); 
    if (isset($_POST['addDev'])) {
        # code...
        $devCode = $_POST['devCode'];
        $devName = $_POST['devName'];
        
        $result= $conn->query("INSERT INTO devices (Device_Code, name, User_ID) VALUES('$devCode','$devName','$userID')");
        echo "<script type='text/javascript'>
                Swal.fire('Success!', 'Device successfully added!', 'success').then(function() {
                window.location = 'device.php';
                            });
                </script>";

    }

    if (isset($_GET['notif'])) {
        # code...
        $newstatus = $_GET['notif'];
        if ($newstatus == 1) {
            # code...
            $new='ON';

        }
        if ($newstatus == 0) {
            # code...
            $new='OFF';

        }
        echo "<script type='text/javascript'>
                Swal.fire('Success!', 'Device is now: ".$new."', 'success');
                </script>";
    }
    
    ?>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
        <h2>EcoPlug</h2>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg
">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <h2>EcoPlug</h2>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <!-- <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form> -->
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="device.php">
              <i class="ni ni-ui-04 text-blue"></i> Devices
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="reports.php">
              <i class="ni ni-bullet-list-67 text-red"></i> Tables
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="account.php">
              <i class="ni ni-single-02 text-yellow"></i> Account
            </a>
          </li>
          
          
          
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
<!--         <h6 class="navbar-heading text-muted">Documentation</h6>
 -->        <!-- Navigation -->
        
        
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
        <!-- Form -->
        <!-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form> -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $userName; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="account.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              
              <a href="reports.php" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              
              <div class="dropdown-divider"></div>
              <a href="../login.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            
          </div>
        </div>
      </div>
      <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <h2 class="text-white mb-0">Connected Devices</h2>
                </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid mt--7">
      <br>
      <div class="container">
        <div class="row">
            <div class="device-card">
              <h3>Add Device</h3>
            <hr>
            <form method="POST" action="">
                <div class="row">
                    <div class="form-group col-md-9" style="float: left;">
                    <label >Device Code</label>
                    <input type="text" name="devCode" class="form-control">
                </div>
                <div class="form-group col-md-9" style="float: left;">
                    <label >Device Name</label>
                    <input type="text" name="devName" class="form-control">
                </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="addDev">Add</button>
                </div>
            </form>  
            </div>
            
        </div>
    <hr>
    <h3>Device List</h3>
    <div class="device-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $deviceId = $row["id"];
                $deviceName = $row["name"];
                $status = $row["status"];
        ?>
                <div class="device-card">
                    <h2><?php echo $deviceName; ?> <a style="float: right;" onclick="return confirm('Are you sure you want to remove this device?')" href="device.php?delID=<?php echo $deviceId; ?>" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg></a></h2>
                    <p>Status: <span class="status" style="color:<?php if ($status==1) {
                        echo "green";
                    }else{
                        echo "#ff5c5c";}?>" ><?php echo ($status ? "ON" : "OFF"); ?></span></p>
                    <form action="control.php" method="post">
                        <input type="hidden" name="device_id" value="<?php echo $deviceId; ?>">
                        <input type="hidden" name="status" value="<?php echo ($status ? 0 : 1); ?>">
                        
                        <button   <?php  if ($status==1){
                            echo "class='btn btn-danger'";
                        }else{
                            echo "class='btn btn-success'";
                        }?> type="submit"><?php echo ($status ? "Turn Off" : "Turn On"); ?></button>
                    </form>
                </div>
        <?php
            }
        } else {
            echo "No devices found.";
        }
        ?>
    </div>
    </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="./assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>