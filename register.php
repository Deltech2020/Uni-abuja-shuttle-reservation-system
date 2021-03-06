<?php
include_once('config.php');
if (!empty($_SESSION['uid'])) {
  header('location:index.php');
}
if (!empty($_SESSION['driver'])) {
  header('location:driver_dashboard.php');
}
if (!empty($_SESSION['admin'])) {
  header('location:admin_dashboard.php');
}

//Coding For Signup
if(isset($_POST['signup']))
{
//Getting Psot Values
$fname=$_POST['fullname'];	
$email=$_POST['email'];	
$mobile=$_POST['mobilenumber'];	
$pass=$_POST['password'];
$role = 	'user';
$bus_id = 'null';
//Checking email id exist for not
$result ="SELECT count(*) FROM tblusers WHERE EmailId=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$email);$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
//if email already exist
if($count>0)
{
echo "<script>alert('Email id already associated with another account. Please try with diffrent EmailId.');</script>";
} 
// If email not exist
else {
$sql="INSERT into tblusers(FullName,EmailId,MobileNumber,Password,Role,bus_id)VALUES(?,?,?,?,?,?)";
$stmti = $mysqli->prepare($sql);
$stmti->bind_param('ssssss', $fname,$email,$mobile,$pass,$role,$bus_id);
$stmti->execute();
$stmti->close();

$_SESSION['success_message'] = 'User registered Successfully';
$_SESSION['fname']=$FullName;
$_SESSION['uid']=$id;
header('location:index.php');

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Transit Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
  body {
  background-image: url('dist/img/campus.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
  </style>
</head>
<body class="hold-transition register-page">
<div class="row justify-content-center">
    <img src="dist/img/logo.jpeg" style="width:100px; height:100px"alt="">
    </div>
    <br>
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <a href="#" class="h6">University of Abuja shuttle reservation system</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form                                                                                                             znnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnh method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="fullname" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="mobilenumber" placeholder="Phone number" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="signup" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
