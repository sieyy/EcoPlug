<?php require_once 'connection.php';
session_start();?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style type="text/css">
  .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
</style>
<body>
  <?php 
  if (isset($_POST['login'])) {
     # code...
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * from users WHERE Email = '$username' AND Password = '$password'");
    $row = $result->fetch_row();
    if ($row>0) {
      # code...
      $result1 = $conn->query("SELECT * from users WHERE Email = '$username' AND Password = '$password'");
      $row1 = $result1->fetch_array();
      $id = $row1['ID'];
      $_SESSION['userID'] = $id;
      header("Location: System/index.php?id=$id");
    }else{
      echo "<script type='text/javascript'>
                Swal.fire('Incorrect account credentials!', 'Please use the correct account credentials', 'error').then(function() {
    window.location = 'login.php';
});
                </script>";

    }

   } 

  ?>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">EcoPlug</h4>
                </div>

                <form method="POST" action="">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example11" class="form-control"
                      placeholder="Email address"  required name="username" />
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" required name="password" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="login">Log
                      in</button>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="register.php" type="button" class="btn btn-outline-danger">Create new</a>
                    
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">About EcoPlug</h4>
                <p class="small mb-0">An Ecoplug project could involve using Arduino to create a smart energy monitoring system. The Arduino board could be connected to various sensors and power measurement devices to monitor and analyze energy consumption. This data could then be used to optimize energy usage and promote sustainable practices.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>