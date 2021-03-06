<?php
session_start();
$username=$_SESSION['username'];
include 'logindb.php';
$query="select * from orders";
$result=mysqli_query($dbc,$query);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  sticky-top">
      <div class="container">
                <div class="col-md-1"><img src="assets/img/letter_m.png" class="logo"></div>
        <a class="navbar-brand" href="HomeU">Mahaveer Laundry</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <span class="navbar-text text-light">
            </span>
            <li class="nav-item active">
              <a class="nav-link" href="homeU.php"><?php echo $_SESSION['username']; ?>
                  <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="logout.php">Log-out

                </a>
              </li>
                <li class="nav-item">
              <a class="nav-link" href="Porder.php">Place Order
              </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="jumbotron details">
      	<table border=2px style="width:100%;padding=10px;height:100%;">
      		<tr>
      			<th>Order ID</th>
      			<th>User</th>
      			<th>Pick-up date</th>
      			<th>Pick-up time</th>
      			<th>Weight</th>
      			<th>Price</th>
      			<th>Status</th>
      			<th>update</th>
      		</tr>
      		<?php while($row=mysqli_fetch_array($result)){ ?>
      		<tr>
      			<td><?php echo $row['orderid']; ?></td>
      			<td><?php echo $row['username']; ?></td>
      			<td><?php echo $row['pdate']; ?></td>
      			<td><?php if($row['ptime']==1) echo "10:00am to 12:00pm"; else echo "3:00pm to 6:00pm" ?></td>
      			<td><?php if($row['kg'] <=0){ ?> <input type="number" form="<?php echo $row['orderid'] ?>" name="weight"/> <?php } ?> <?php if($row['kg'] > 0) echo $row['kg']; ?></td>
      			<td><?php if($row['price'] <=0) echo "Calculating"; else echo $row['price']; ?></td>
      			<td><?php if($row['status']==0){ echo "Placed" ?><form method="post" action="update2.php">
      							<input type="hidden" name="orderi" value="<?php echo $row['orderid'] ?>" />
      							<input type="hidden" name="stat" value="<?php echo $row['status'] ?>" />
      							<input type="submit" value="update" name="submit"/>
      						</form> <?php } ?>
      					<?php	if($row['status']==1){ echo "Processing";?><form method="post" action="update2.php">
      							<input type="hidden" name="orderi" value="<?php echo $row['orderid'] ?>" />
      							<input type="hidden" name="stat" value="<?php echo $row['status'] ?>" />
      							<input type="submit" value="update" name="submit"/>
      							</form><?php } ?>
      					<?php	if($row['status']==2){ echo "Dispatched";?><form method="post" action="update2.php">
      							<input type="hidden" name="orderi" value="<?php echo $row['orderid'] ?>" />
      							<input type="hidden" name="stat" value="<?php echo $row['status'] ?>" />
      							<input type="submit" value="update" name="submit"/>
      							</form><?php } ?>
      					<?php	if($row['status']==3) echo "Completed"; ?>
      					</td>
      			<td><form id="<?php echo $row['orderid'] ?>" action="update.php" style="position:relative;bottom:0;" method="post">
      			<input type="hidden" value="<?php echo $n; ?>" name="n"/>
      			<input type="submit" value="<?php echo $row['orderid'] ?>" name="submit">
      		</form></td
      		</tr>
      		<?php $n=$row['orderid']; }  ?>     		
      	</table>
      	<br>
 <!--     	<center><form id="update" action="update.php" style="position:relative;bottom:0;">
      			<input type="hidden" value="<?php echo $n; ?>" name="n"/>
      			<input type="submit" value="<?php echo $row['orderid'] ?>" name="submit">
      		</form></center> -->
      </div>
      		
      <!-- Footer -->
      <footer class="py-5 ">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Presidency University 2018</p>
        </div>
      </footer>
    </body>

    </html>
