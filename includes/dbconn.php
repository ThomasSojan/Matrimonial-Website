
<?php

$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="matrimony"; 


$conn=mysqli_connect($host, $username, $password) or die("cannot connect");

mysqli_select_db($conn,"matrimony")or die("cannot select DB");

?>
