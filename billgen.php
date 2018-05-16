<?php
session_start();

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="laundry";
$dbh = mysqli_connect($db_host,$db_user,$db_password,$db_name) or die (" could not connect to database".mysqli_error($dbh));

$query2="select * from bill_generation  where userid=3;";
	$result2=mysqli_query($dbh,$query2);
$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
$price1= (10 * $row2['shirts']) + ( 10 * $row2['pants'] ) +  ( 5 * $row2['apron'] ) +  ( 20 * $row2['bedsheet'] ) +  ( 5 * $row2['pillowcover'] ) ;
    echo $price1;
?>