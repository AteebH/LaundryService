
<?php
session_start();
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
       
        $(document).ready(function() {
    var opt = $("#place option").sort(function (a,b) { return a.value.toUpperCase().localeCompare(b.value.toUpperCase()) });
    $("#place").append(opt);
});
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
              <a class="nav-link" href="HomeU.php"><?php echo $_SESSION['username']; ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout

                </a>
              </li>
              <li class="nav-item active">
              <a class="nav-link" href="Porder.php">Place Order
              <span class="sr-only">(current)</span></a>
            </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="jumbotron">
      	<h5 style="text-align:center;"><?php echo $_SESSION['username']; ?></h5>
        <fieldset>
          <center><legend>Pick-Up Schedule </legend></center><?php
          $errors=array(1=>"OrderSuccesful",2=>"Please Try Again");
          $error_id=isset($_GET['err'])?(int)$_GET['err']:0;
          if($error_id==1){
            echo "<center><p class=' alert alert-success'>";
            echo "$errors[$error_id]";
            echo "</p></center>";
          }
          elseif($error_id==2){
            echo "<center><p class='alert alert-danger'>$errors[$error_id]</p></center>";
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
                  <form action="orderdb.php" method="post">
                    <label for="date">Date:</label>
                      <select class="form-control" name="date" id="date"required>
                          <?php
                          $startdate=strtotime("Tomorrow");
                          $enddate=strtotime("+3 days", $startdate);  
                          while ($startdate < $enddate) { 
                          ?>
                          <option value="<?php echo date('M d Y', $startdate) ?>"><?php echo date('M d', $startdate); ?></option>
                      <?php $startdate = strtotime("+1 days", $startdate); } ?>
                      </select>
                    <br>
                      <label for="time">Time:</label>
                      <select class="form-control" name="time" id="time"required>
                      <option value="1">10:00am - 12:00pm</option>
                        <option value="2">3:00pm - 6:00pm</option>
                      </select>
                      <br>
                    <button class="btn btn-default" type="submit" name="submit" id="submit">Submit </button>
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
