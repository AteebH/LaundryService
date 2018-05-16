<html>
<body>

<?php
$dbc = mysqli_connect('localhost', 'root', '', 'laundry') or die('Error connecting to MySQL server.');
$pants= $_POST['pants'];
$shirts= $_POST['shirts'];
$bed= $_POST['bedsheets'];
$cover= $_POST['covers'];
$address=$_post['address'];
$sta=0;

$query ="insert into orderi values ('$shirts','$pants','$bed','$cover','$sta','$address');";


$result = mysqli_query($dbc, $query) or die ('Error querying database.');
echo "Thanks for visiting. We are updating our website, keep visiting.";
mysqli_close($dbc); // Close the connection to the database, in your script.
?>

</body>
</html>