<?php
function mysqlexec($sql){
	$host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="matrimony"; // Database name

// Connect to server and select databse.
	$conn=mysqli_connect("$host", "$username", "$password")or die("cannot connect");

	mysqli_select_db($conn,"$db_name")or die("cannot select DB");

	if($result = mysqli_query($conn, $sql)){
		return $result;
	}
	else{
		echo mysqli_error($conn);
	}


}
function searchid(){
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$profid=$_POST['profid'];
		$sql="SELECT * FROM customer WHERE id=$profid";
		$result = mysqlexec($sql);
    	return $result;
	}
}

function search(){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agemin=$_POST['agemin'];
    $agemax=$_POST['agemax'];
    $maritalstatus=$_POST['maritalstatus'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $religion=$_POST['religion'];
    $mothertounge=$_POST['mothertounge'];
    $sex = $_POST['sex'];

    $sql="SELECT * FROM customer WHERE
    sex='$sex'
    AND age>='$agemin'
    AND age<='$agemax'
    AND maritalstatus = '$maritalstatus'
    AND country = '$country'
    AND state = '$state'
    AND religion = '$religion'
    AND mothertounge = '$mothertounge'
    ";

    $result = mysqlexec($sql);
    return $result;

  }
}
function writepartnerprefs($id){
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$agemin=$_POST['agemin'];
		$agemax=$_POST['agemax'];
		$maritalstatus=$_POST['maritalstatus'];
		$complexion=$_POST['colour'];
		$height=$_POST['height'];
		$diet=$_POST['diet'];
		$religion=$_POST['religion'];
		$caste=$_POST['caste'];
		$mothertounge=$_POST['mothertounge'];
		$education=$_POST['education'];
		$occupation=$_POST['occupation'];
		$country=$_POST['country'];
		$descr=$_POST['descr'];

		$sql = "UPDATE
				   partnerprefs
				SET
				   agemin = '$agemin',
				   agemax='$agemax',
				   maritalstatus = '$maritalstatus',
				   complexion = '$complexion',
				   height = '$height',
				   diet = '$diet',
				   religion='$religion',
				   caste = '$caste',
				   mothertounge = '$mothertounge',
				   education='$education',
				   descr = '$descr',
				   occupation = '$occupation',
				   country = '$country'
				WHERE
				   custId = '$id'";

		$result = mysqlexec($sql);
		if ($result) {
			echo "<script>alert(\"Successfully updated Partner Preference\")</script>";
			echo "<script> window.location=\"userhome.php?id=$id\"</script>";

		}
		else{
			echo "Error";
		}

	}
}


function register(){
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$uname=$_POST['name'];
	$pass=$_POST['pass'];
	$email=$_POST['email'];
	$day=$_POST['day'];
	$month=$_POST['month'];
	$year=$_POST['year'];
		$day=$_POST['day'];
		$month=$_POST['month'];
		$year=$_POST['year'];
	$dob=$year ."-" . $month . "-" .$day ;
	$gender=$_POST['gender'];
	//require_once("includes/dbconn.php");

	$sql = "INSERT
			INTO
			   users
			   ( profilestat, username, password, email, dateofbirth, gender, userlevel)
			VALUES
			   (0, '$uname', '$pass', '$email', '$dob', '$gender', 0)";

	//if (mysqli_query($conn,$sql)) {
	 // echo "Successfully Registered";
	 // echo "<a href=\"login.php\">";
	 // echo "Login to your account";
	 // echo "</a>";
	//} else {
	//  echo "Error: " . $sql . "<br>" . $conn->error;
	//}
	$result = mysqlexec($sql);
		if ($result) {
			echo "Successfully Registered";
	  echo "<a href=\"login.php\">";
	  echo "Login to your account";
	  echo "</a>";

		}
		else{
			echo "Error";
		}

}
}

function isloggedin(){
	if(!isset($_SESSION['id'])){
	 	return false;
	}
	else{
		return true;
	}

}


function processprofile_form($id){


	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$sex=$_POST['sex'];
	$email=$_POST['email'];

		$day=$_POST['day'];
		$month=$_POST['month'];
		$year=$_POST['year'];
	$dob=$year ."-" . $month . "-" .$day ;

	$religion=$_POST['religion'];
	$caste = $_POST['caste'];
	$subcaste=$_POST['subcaste'];

	$country = $_POST['country'];
	$state=$_POST['state'];
	$district=$_POST['district'];
	$age=$_POST['age'];
	$maritalstatus=$_POST['maritalstatus'];
	$profileby=$_POST['profileby'];
	$education=$_POST['education'];
	$edudescr=$_POST['edudescr'];
	$bodytype=$_POST['bodytype'];
	$physicalstatus=$_POST['physicalstatus'];
	$drink=$_POST['drink'];
	$smoke=$_POST['smoke'];
	$mothertounge=$_POST['mothertounge'];
	$bloodgroup=$_POST['bloodgroup'];
	$weight=$_POST['weight'];
	$height=$_POST['height'];
	$colour=$_POST['colour'];
	$diet=$_POST['diet'];
	$occupation=$_POST['occupation'];
	$occupationdescr=$_POST['occupationdescr'];
	$fatheroccupation=$_POST['fatheroccupation'];
	$motheroccupation=$_POST['motheroccupation'];
	$income=$_POST['income'];
	$bros=$_POST['bros'];
	$sis=$_POST['sis'];
	$aboutme=$_POST['aboutme'];



	
	$sql="SELECT cust_id FROM customer WHERE cust_id=$id";
	$result=mysqlexec($sql);

if(mysqli_num_rows($result)>=1){
	
	$sql="UPDATE
   			customer
		SET
		   email = '$email',
		   age = '$age',
		   sex = '$sex',
		   religion = '$religion',
		   caste = '$caste',
		   subcaste = '$subcaste',
		   district = '$district',
		   state = '$state',
		   country = '$country',
		   maritalstatus = '$maritalstatus',
		   profilecreatedby = '$profileby',
		   education  = '$education',
		   education_sub = '$edudescr',
		   firstname = '$fname',
		   lastname = '$lname',
		   body_type = '$bodytype',
		   physical_status = '$physicalstatus',
		   drink =  '$drink',
		   mothertounge = '$mothertounge',
		   colour = '$colour',
		   weight = '$weight',
		   smoke = '$smoke',
		   dateofbirth = '$dob',
		   occupation = '$occupation',
		   occupation_descr = '$occupationdescr',
		   annual_income = '$income',
		   fathers_occupation = '$fatheroccupation',
		   mothers_occupation = '$motheroccupation',
		   no_bro = '$bros',
		   no_sis = '$sis',
		   aboutme = '$aboutme'
		WHERE cust_id=$id; "
		   ;
   $result=mysqlexec($sql);
   if ($result) {
   	echo "<script>alert(\"Successfully Updated Profile\")</script>";
   	// echo "<script> window.location=\"userhome.php?id=$id\"</script>";
   }
}else{
	
	$sql = "INSERT
				INTO
				   customer
				   (cust_id, email, age, sex, religion, caste, subcaste, district, state, country, maritalstatus, profilecreatedby, education, education_sub, firstname, lastname, body_type, physical_status, drink, mothertounge, colour, weight, height, blood_group, diet, smoke,   dateofbirth, occupation, occupation_descr, annual_income, fathers_occupation, mothers_occupation, no_bro, no_sis, aboutme, profilecreationdate  )
				VALUES
				   ('$id','$email', '$age', '$sex', '$religion', '$caste', '$subcaste', '$district', '$state', '$country', '$maritalstatus', '$profileby', '$education', '$edudescr', '$fname', '$lname', '$bodytype', '$physicalstatus', '$drink', '$mothertounge', '$colour', '$weight', '$height', '$bloodgroup', '$diet', '$smoke', '$dob', '$occupation', '$occupationdescr', '$income', '$fatheroccupation', '$motheroccupation', '$bros', '$sis', '$aboutme', CURDATE())
			";
	if (mysqlexec($sql)) {
	  echo "Successfully Created profile";
	  echo "<a href=\"userhome.php?id={$id}\">";
	  echo "Back to home";
	  echo "</a>";
	  
	  $sql2="INSERT INTO partnerprefs (id, custId) VALUES('', '$id')";
	  mysqlexec($sql2);
	  $sql2="UPDATE TABLE users SET profilestat='1' WHERE id=$id";
	  mysqlexec($sql2);
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


}

//function for upload photo

function uploadphoto($id){
	$target = "profile/". $id ."/";
if (!file_exists($target)) {
    mkdir($target, 0777, true);
}

$target1 = $target . basename( $_FILES['pic1']['name']);
$target2 = $target . basename( $_FILES['pic2']['name']);
$target3 = $target . basename( $_FILES['pic3']['name']);
$target4 = $target . basename( $_FILES['pic4']['name']);



$pic1=($_FILES['pic1']['name']);
$pic2=($_FILES['pic2']['name']);
$pic3=($_FILES['pic3']['name']);
$pic4=($_FILES['pic4']['name']);

$sql="SELECT id FROM photos WHERE cust_id = '$id'";
$result = mysqlexec($sql);


if(mysqli_num_rows($result) == 0) {
  
		$sql="INSERT INTO photos (id, cust_id, pic1, pic2, pic3, pic4) VALUES ('', '$id', '$pic1' ,'$pic2', '$pic3','$pic4')";
		
		mysqlexec($sql);


} else {
 
     $sql="UPDATE photos SET pic1 = '$pic1', pic2 = '$pic2', pic3 = '$pic3', pic4 = '$pic4' WHERE cust_id=$id";
		
	mysqlexec($sql);
}

if(move_uploaded_file($_FILES['pic1']['tmp_name'], $target1)&&move_uploaded_file($_FILES['pic2']['tmp_name'], $target2)&&move_uploaded_file($_FILES['pic3']['tmp_name'], $target3)&&move_uploaded_file($_FILES['pic4']['tmp_name'], $target4))
{

echo "The files has been uploaded, and your information has been added to the directory";
}
else {

echo "Sorry, there was a problem uploading your file.";
}

}

?>
