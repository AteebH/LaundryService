<?php
	session_start();
	include 'logindb.php';
	$weight=$_POST['weight'];
	$id=$_POST['submit'];
		$query="select * from orders where kg=0";
		$result=mysqli_query($dbc,$query) or die("nope");
				$query2="update orders set kg=$weight where orderid=$id";
				mysqli_query($dbc,$query2) or die("nope1");
				$price=50*$weight;
				$query3="update orders set price=$price where orderid=$id";
				mysqli_query($dbc,$query3);
	header('location:adminhome.php');
			
?>
