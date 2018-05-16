<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
</head>
<body>

<ul>
  <li><a href='homeal.php'>Home</a></li>
  <li><a href='order.php'>place our order </a></li>
  <li><a href='status.php'>check your order status </a></li>
   <li style="float:right"><a class="active" href='how.php'>how we work</a></li> 
  <li style="float:right"><a class="active" href='about.php'>About us</a></li>
</ul>
<div style='background-color: lightgrey;width: 500px;border: 25px solid green;padding: 25px;    margin: 25px;'>
<form method="post" action="orderdb.php">
<label > pants </label>
  <input type="number" name="pants" required><br>
  
  <label>shirts: </label>
  <input type="number" name="shirts" required><br>
  <label>bedsheets :</label>
  <input type="number" name="bedsheets" required><br>
  <label>pillow cover:</label>
  <input type="number" name="covers" required>
  <label>address:</label>
  <input type="text" name="address" required>
  <input type="submit" value="submit" >
    
</form>
</div>
</body>
</html>