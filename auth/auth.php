<?php
session_start();
require_once("../includes/dbconn.php");
$userlevel=$_GET['user'];
// username and password sent from form 
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 


$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);

$sql="SELECT * FROM users WHERE username='$myusername' AND password='$mypassword'";
$result=mysqli_query($conn,$sql);


$count=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
$id=$row['id'];
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

	$_SESSION['username']= $myusername;
	$_SESSION['id']=$id;
	if($userlevel=='1')
		header("location:../userhome.php?id={$row['id']}");
	else
		header("location:../admin.php");
}
else {
echo "Wrong Username or Password";
}
?>