<?php
	session_start();
	include 'logindb.php';
	$stat=$_POST['stat'];
	$id=$_POST['orderi'];
	$query="update orders set status=status+1 where orderid=$id";
	mysqli_query($dbc,$query);
	header('location:adminhome.php');
?>
