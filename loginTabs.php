<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
  $_SESSION['logged_in']=0;
}


include 'logindb.php';


$form_username =isset($_POST['username'])? $_POST['username'] : '';
$form_password =isset($_POST['password'])? $_POST['password'] : '';
$_SESSION['username']=$form_username;
echo $_SESSION['username'];

if(!empty($_POST['username']))
{
  $query = "SELECT * from login where username='$form_username' and pass='$form_password'";

  $result = mysqli_query($dbc, $query) or die("Failed to query from database. You are not eligible for industry practice");
  //COMMENT LINE BELOW IF USING 'loginTabs.php'
  $row = mysqli_fetch_array($result) or die(header('location:loginTabs.php?err=1'));
  //COMMENT THE LINE BELOW IF USING 'loginDD.php'
  // $row = mysqli_fetch_array($result) or die(header('location:loginTabs.php?err=1'));

  if(!empty($row['username']) && !empty($row['pass']))
  {
    if($_SESSION['username']==$row['username'] && $form_password == $row['pass']){
    	if($row['type']==0){
    	$_SESSION['username']=$form_username;
    	header('location:HomeU.php');
    	}
    elseif($row['type']==1){
    	$_SESSION['username']=$form_username;
    	header('location:adminhome.php');
    }
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
            <li class="nav-item active">
              <a class="nav-link" href="loginTabs.php">Login

                <span class="sr-only">(current)</span></a>
              </li>
                <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign-Up
              </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="jumbotron col-md-4">
        <fieldset>
          <center><legend>Login </legend></center><?php
          $errors=array(1=>"Invalid username or password, try again.",2=>"Please login to access this area",3=>"Enter your details to Login");
          $error_id=isset($_GET['err'])?(int)$_GET['err']:0;
          if($error_id==1){
            echo "<center><p class=' alert alert-danger'>";
            echo "$errors[$error_id]";
            echo "</p></center>";
          }
          elseif($error_id==2){
            echo "<center><p class='alert alert-danger'>$errors[$error_id]</p></center>";
          }
          elseif($error_id==3){
            echo "<center><p class='alert alert-success'>$errors[$error_id]</p></center>";
          }
          ?>
          <div id="loginDiv">
            <div class="container">
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#Student" role="tab">User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#Admin" role="tab">Admin</a>
                </li>
              </ul>

              <div class="tab-content">

                <!-- USER LOGIN -->
                <div id="Student" class="tab-pane fade show active" role="tabpanel">
                  <br>
                  <form action="loginTabs.php" method="post">
                    <input type="hidden" name="role" value="login"/>
                    <label for="Username" style="text-align:left">Username </label>
                    <input class="form-control" type="text" name="username" placeholder="Username">
                    <br>
                    <label for="Password">Password </label>
                    <input class="form-control" type="password" name="password" id="Password" placeholder="Password" onchange='check_pass();'>
                    <br>
                    <button class="btn btn-default" type="submit" name="submit" id="submit">Login </button>
                  </form>
                </div>

                <!-- ADMIN LOGIN -->
                <div id="Admin" class="tab-pane fade" role="tabpanel">
                  <br>
                  <form action="loginTabs.php" method="post">
                    <input type="hidden" name="role" value="AdminLogin"/>
                    <label for="Username" style="text-align:left">Username </label>
                    <input class="form-control" type="text" name="username" placeholder="Admin ID">
                    <br>
                    <label for="Password">Password </label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    <br>
                    <button class="btn btn-default">Login </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
      <!-- Footer -->
      <footer class="py-5 " style="bottom:0;">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Mahaveer Laundry</p>
        </div>
      </footer>
    </body>

    </html>
