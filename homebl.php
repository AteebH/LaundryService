<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
  $_SESSION['logged_in']=0;
}


include 'logindb.php';


$form_username = isset($_POST['Username']) ? $_POST['Username'] : '';
$form_password = isset($_POST['Password']) ? $_POST['Password'] : '';
$_SESSION['username']=$form_username;


if(!empty($_POST['Username']))
{
  $query = "SELECT * from login where username='$form_username' and password='$form_password'";

  $result = mysqli_query($dbc, $query) or die("Failed to query from database. You are not eligible for industry practice");
  //COMMENT LINE BELOW IF USING 'loginTabs.php'
  $row = mysqli_fetch_array($result) or die(header('location:loginTabs.php?err=1'));
  //COMMENT THE LINE BELOW IF USING 'loginDD.php'
  // $row = mysqli_fetch_array($result) or die(header('location:loginTabs.php?err=1'));

  if(!empty($row['username']) && !empty($row['password']))
  {
    if($_SESSION['username']==$row['username'] && $form_password == $row['password'])
    {
      header('location:homeal.php');
    }
    else {
      header('location:loginTabs.php?err=1');
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function check_pass() {
    if (document.getElementById('Password').value ==
            document.getElementById('c_Password').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
    </script>

</head>

<body>
  <div class="container-fluid mb-2 mt-2">
    <div class="row">
      <div class="col-md-2"><img src="assets/img/letter_m.png" class="logo"></div>
      <div class="col-md-6 text-center">
        <h3 class="text-center">Mahaveer Laundry</h3>
        <h4 class="text-center">Service</h4>    
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark  sticky-top">
      <div class="container">
        <a class="navbar-brand" href="">Mahaveer Laundry</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <span class="navbar-text text-light">
            </span>

            <li class="nav-item active">
              <a class="nav-link" href="homebl.php">Home
              <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="loginTabs.php">Login

                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign-Up
              </a>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- Footer -->
      <footer class="py-5" style="margin-top: 400px;">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Presidency University 2018</p>
        </div>
      </footer>
    </body>

    </html>
