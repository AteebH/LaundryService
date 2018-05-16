<?php

$db_host='localhost';
$db_user='root';
$db_password='';
$db_name='laundry';

$dbh=mysqli_connect($db_host,$db_user,$db_password,$db_name) or die ('Error connecting to mysql server');
$shirt=$_POST['shirt'];
$pant=$_POST['pant'];
$apron=$_POST['apron'];
$bedsheets=$_POST['bedsheets'];
$pillow=$_POST['pillow-cover'];

$query="insert into bill_generation values ('$shirt','$pant','$apron','$bedsheets','$pillow','3','2','1');";
$result=mysqli_query($dbh,$query) or die("Nope");
	
echo "order complete";
?>