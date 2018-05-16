<html>
<body>
    <h1></h1>
    <?php
    
echo "hello";


$dbc = mysqli_connect('localhost', 'root', 'tiger', '2015cse077') or die('Error connecting to MySQL server.');
echo "<br>";

$name = $_POST['username'];
$password= $_POST['password'];
$mobile= $_POST['phone'];
$mail= $_POST['email'];
    $door=$_POST['door'];
    $street=$_POST['street'];
    $place=$_POST['place'];
    echo "<br>";
$query = "insert into login(username,pass) values ('$name','$password')";
    $query1="insert into customer_details(username,phone,mailid,door,street,location) values('$name','$mobile','$mail','$door','$street','$place')";
mysqli_query($dbc, $query);
if(mysqli_query($dbc, $query1)){
    header('location:loginTabs.php?err=3');
}
else{
    header('location:signup.php?err=1');
}
$row = mysqli_fetch_array($result);

mysqli_close($dbc);  
?>

    
