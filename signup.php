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
        $(document).ready(function() {
    var opt = $("#place option").sort(function (a,b) { return a.value.toUpperCase().localeCompare(b.value.toUpperCase()) });
    $("#place").append(opt);
});
    </script>
<style>
    body{
        background-image: url(assets/img/home.jpg);
    }
    </style>
</head>

<body >
    <nav class="navbar navbar-expand-lg navbar-dark  sticky-top">
      <div class="container">
        <div class="col-md-1"><img src="assets/img/letter_m.png" class="logo"></div>
        <a class="navbar-brand" href="">Mahaveer Laundry</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <span class="navbar-text text-light">
            </span>

            <li class="nav-item ">
              <a class="nav-link" href="home.php">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="loginTabs.php">Login

                </a>
              </li>
              <li class="nav-item active">
              <a class="nav-link" href="signup.php">Sign-Up
              <span class="sr-only">(current)</span></a>
            </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="jumbotron">
        <fieldset>
          <center><legend>Sign-Up </legend></center><?php
          $errors=array(1=>"Please Enter Valid information",2=>"Please login to access this area");
          $error_id=isset($_GET['err'])?(int)$_GET['err']:0;
          if($error_id==1){
            echo "<center><p class=' alert alert-danger'>";
            echo "$errors[$error_id]";
            echo "</p></center>";
          }
          elseif($error_id==2){
            echo "<center><p class='text-danger'>$errors[$error_id]</p></center>";
          }
          ?>
          <div id="loginDiv">
            <div class="container">
<!--
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#Student" role="tab">Sign-Up</a>
                </li>
              </ul>
-->

              <div class="tab-content">
                <div id="Student" class="tab-pane fade show active" role="tabpanel">
                  <br>
                  <form action="signupdb.php" method="post">
                    <input type="hidden" name="role" value="login"/>
                    <label for="Username" style="text-align:left">Username </label>
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                    <br>
                      <label for="Phone" style="text-align:left">Phone Number </label>
                    <input class="form-control" type="number" name="phone" placeholder="Phone Number" required>
                    <br>
                      <label for="Mail" style="text-align:left">Email-ID </label>
                    <input class="form-control" type="mail" name="email" placeholder="Someone@something.com" required>
                    <br>
                    <label for="Password">Password </label>
                    <input class="form-control" type="password" name="password" id="Password" placeholder="Password" onchange='check_pass();'required>
                    <br>
                    <label for="Password">Confirm Password </label>
                    <input class="form-control" type="password" name="c_password" id="c_Password" placeholder="Confirm Password" onchange='check_pass();'required><div id='alert'></dvi>
                      <label for="Door" style="text-align:left">Door: </label>
                    <input class="form-control" type="text" name="door" placeholder="Door" required>
                    <br>
                      <label for="Street" style="text-align:left">Street </label>
                    <input class="form-control" type="text" name="street" placeholder="street" required>
                    <br>
                    <label for="place">Pickup Area: </label>
                      <select class="form-control" name="place" id="place"required>
                          <option> MARATHALLI</option>
                            <option>INDRANAGAR</option>
                          <option> DOMLUR</option>
                          <option> LINGARAJAPURAM</option>
                          <option> KAMANAHALLI</option>
                        <option> K R PURAM</option>
                      </select>
                    <br>

                      <br>
                    <button class="btn btn-default" type="submit" name="submit" id="submit" disabled>Login </button>
                  </form>
                  </div>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
      <!-- Footer --><br><br><br>
      <footer class="py-5 ">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Mahaveer Laundry</p>
        </div>
      </footer>
    </body>

    </html>
