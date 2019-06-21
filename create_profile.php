<?php include_once("includes/basic_includes.php");?>
<?php include_once("functions.php"); ?>
<?php require_once("includes/dbconn.php");?>
<?php
if(isloggedin()){
 //do nothing stay here
} else{
   header("location:login.php");
}
 
$id=$_GET['id'];
//safty purpose copy the get id
$profileid=$id;

//getting profile details from db
$sql="SELECT * FROM customer WHERE cust_id = $id";
$result = mysqlexec($sql);
if($result){
$row=mysqli_fetch_assoc($result);

	$fname=$row['firstname'];
	$lname=$row['lastname'];
	$sex=$row['sex'];
	$email=$row['email'];
	$dob=$row['dateofbirth'];
	$religion=$row['religion'];
	$caste = $row['caste'];
	$subcaste=$row['subcaste'];
	$country = $row['country'];
	$state=$row['state'];
	$district=$row['district'];
	$age=$row['age'];
	$maritalstatus=$row['maritalstatus'];
	$profileby=$row['profilecreatedby'];
	$education=$row['education'];
	$edudescr=$row['education_sub'];
	$bodytype=$row['body_type'];
	$physicalstatus=$row['physical_status'];
	$drink=$row['drink'];
	$smoke=$row['smoke'];
	$mothertounge=$row['mothertounge'];
	$bloodgroup=$row['blood_group'];
	$weight=$row['weight'];
	$height=$row['height'];
	$colour=$row['colour'];
	$diet=$row['diet'];
	$occupation=$row['occupation'];
	$occupationdescr=$row['occupation_descr'];
	$fatheroccupation=$row['fathers_occupation'];
	$motheroccupation=$row['mothers_occupation'];
	$income=$row['annual_income'];
	$bros=$row['no_bro'];
	$sis=$row['no_sis'];
	$aboutme=$row['aboutme'];

	$day=date("d", strtotime($dob));
	$month=date("m", strtotime($dob));
	$year=date("Y", strtotime($dob));

}
	else{
		echo "<script>alert(\"Invalid Profile ID\")</script>";
	}
	
	?>



<?php
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		processprofile_form($id);
}
?>


<!DOCTYPE HTML>
<html>
<head>
<title>
  Register 
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!--font-Awesome-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--font-Awesome-->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>
<body>

<?php include_once("includes/navigation.php");?>
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.php"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Create Your Profile</li>
     </ul>
   </div>
   <div class="services">
   	  <div class="col-sm-12 login_left">
	     <form action="" method="POST">
	  	    <div class="form-group col-sm-6">
		      <label for="edit-name">First Name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="fname" value="<?php echo $fname; ?>" size="60" maxlength="60" class="form-text required">
			  
		    </div>
		    <div class="form-group col-sm-4">
		      <label for="edit-pass">Last Name <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-last" name="lname" size="60" maxlength="128" value="<?php echo $lname; ?>" class="form-text required">
		    </div>
		     <div class="form-group col-sm-2">
		      <label for="edit-name">Sex <span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="sex" value="<?php echo $sex; ?>"> 
	                    <option value="Male">Male</option>
	                    <option value="Female">Female</option> 
	               
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-6">
		      <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
		      <input type="text" id="edit-name" name="email" value="<?php echo $email; ?>" size="60" maxlength="60" class="form-text required">
		    </div>

	    <div class="form-group col-sm-6">
			    <div class="age_select">
			      <label for="edit-pass">
 Date Of Birth <span class="form-required" title="This field is required.">*</span></label>
			        <div class="age_grid">
			         <div class="col-sm-4 form_box">
	                  <div class="select-block1">
					  <select name="day">
					  <option value=""></option>
					  <?php
					 for ($i=1; $i < 31 ; $i++) { 
						 ?>
		                    <option <?php echo $day==$i ? "selected":"" ?> value="<?php echo $i;?>"><?php echo $i;?></option>
						 <?php
					 } 
					  ?>
	                    </select>
	                  </div>
	            </div>
	            <div class="col-sm-4 form_box2">
	                   <div class="select-block1">
	                    <select name="month" >
						<option value="">Month</option>

						<?php
						$months=array(
						"January",
						"February",
						"March",
						"April",
						"May",
						"June",
						"July",
						"August",
						"September",
						"October",
						"November",
						"December");

					 for ($i=0; $i < 12; $i++) { 
						 ?>
							<option <?php echo $month==$i ? "selected":"" ?> value="<?php echo $i<=9?"0$i":$i;?>"><?php echo 
							$months[$i];?></option>
						 <?php
					 } 
					  ?>
	                    </select>
	                  </div>
	                 </div>
	                 <div class="col-sm-4 form_box1">
	                   <div class="select-block1">
					   <select name="year">
					  <option value=""></option>
					  <?php
					 for ($i=1970; $i < 2000; $i++) { 
						 ?>
		                    <option <?php echo $year==$i ? "selected":"" ?> value="<?php echo $i;?>"><?php echo $i;?></option>
						 <?php
					 } 
					  ?>
	                    </select>
	                   </div>
	                  </div>
	                  <div class="clearfix"> </div>
	                 </div>
	              </div>
            </div>
            <div class="form-group col-sm-6">
			    <div class="age_select">
			      <label for="edit-pass">Religion <span class="form-required" title="This field is required.">*</span></label>
			        <div class="age_grid">
			         <div class="col-sm-4 form_box">
	                  <div class="select-block1">
	                    <select  name="religion">
						<?php 
						$religionlist=array("Nill","Hindu","Christian","Muslim","Jain","Sikh");
						foreach ($religionlist as $key => $value) {
						?>
		                    <option <?php echo $value==$religion?"selected":"";?> value="<?php echo $value;?>"><?php echo $value;?></option>
					<?php }
					?>
	                    </select>
	                  </div>
	            </div>
	         
	            <div class="col-sm-4 form_box2">
	                   <div class="select-block1">
	                    <select name="caste" value="<?php echo $caste; ?>">
			
		                    <option value="Roman Cathaolic">Roman Cathaolic</option>
		                    <option value="Latin Catholic">Latin Catholic</option>
		                    <option value="Penthecost">Penthecost</option>
		                    <option value="Mappila">Mappila</option>
		                    <option value="Thiyya">Thiyya</option>  
	                    </select>
	                  </div>
	                 </div>
	                 <div class="col-sm-4 form_box1">
	                   <div class="select-block1">
	                    <select name="subcaste" value="<?php echo $subcaste; ?>">
		                    <option value="Not Applicable">Not Applicable</option>
		                    <option value="sub cast1">sub cast1</option>
		                    <option value="sub caste2">sub caste2</option>
		                  
	                    </select>
	                   </div>
	                  </div>
	                  <div class="clearfix"> </div>
	                 </div>
	              </div>
            </div>

              <div class="form-group col-sm-6">
			    <div class="age_select">
			      <label for="edit-pass">Address <span class="form-required" title="This field is required.">*</span></label>
			        <div class="age_grid">
			         <div class="col-sm-4 form_box">
	                  <div class="select-block1">
	                    <select name="country" value="<?php echo $country; ?>">
		                    <option value="Not Applicable">Country</option>
		                    <option value="India">India</option>
		                    <option value="China">China</option>
		                    <option value="UAE">UAE</option>
		                    
	                    </select>
	                  </div>
	            </div>
	         
	            <div class="col-sm-4 form_box2">
	                   <div class="select-block1">
	                    <select name="state">
		                    <option value="">state</option>
		                    <option value="Kerala">Kerala</option>
		                    <option value="Taminadu">Tamilnadu</option>
		                    <option value="Karnataka">Karnataka</option>
		                    <option value="Andhrapradesh">Andrapradesh</option>  
	                    </select>
	                  </div>
	                 </div>
	                 <div class="col-sm-4 form_box1">
	                   <div class="select-block1">
		                    <option value="">District</option>
	                    <select name="district" value="<?php echo $district; ?>">
		                    <option value="Trivandrum">Trivandrum</option>
		                    <option value="Kollam">Kollam</option>
		                    <option value="Pathanamthitta">Pathanamthitta</option>
		                    <option value="Wayanad">Wayanad</option>
	                    </select>
	                   </div>
	                  </div>
	                  <div class="clearfix"> </div>
	                 </div>
	              </div>
            </div>

            
            <div class="form-group col-sm-2">
		      <label for="edit-name">Age<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="age" value="<?php echo $age; ?>">
	                     <option value="">
</option>
		                    <option value="1">1</option>
		                    <option value="2">2</option>
		                    <option value="3">3</option>
		                    <option value="4">4</option>
		                    <option value="5">5</option>
		                    <option value="6">6</option>
		                    <option value="7">7</option>
		                    <option value="8">8</option>
		                    <option value="9">9</option>
		                    <option value="10">10</option>
		                    <option value="11">11</option>
		                    <option value="12">12</option>
		                    <option value="13">13</option>
		                    <option value="14">14</option>
		                    <option value="15">15</option>
		                    <option value="16">16</option>
		                    <option value="17">17</option>
		                    <option value="18">18</option>
		                    <option value="19">19</option>
		                    <option value="20">20</option>
		                    <option value="21">21</option>
		                    <option value="22">22</option>
		                    <option value="23">23</option>
		                    <option value="24">24</option>
		                    <option value="25">25</option>
		                    <option value="26">26</option>
		                    <option value="27">27</option>
		                    <option value="28">28</option>
		                    <option value="29">29</option>
		                    <option value="30">30</option>
		                    <option value="31">31</option>
	                </select>
			    </div>
		    </div>
             <div class="form-group col-sm-2">
		      <label for="edit-name">Marital status <span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="maritalstatus">
	                    <option value="Single">Single</option>
	                    <option value="Married">Married</option> 
	               		<option value="Divorsed">Divorsed</option>
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Profile Created by <span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="profileby">
	                    <option value="Self">Self</option>
	                    <option value="Son/Daughter">Son/Daughter</option> 
	               		<option value="Other">Other</option> 
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Education <span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="education">
	                    <option value="Primary">Primary</option>
	                    <option value="Tenth level">Tenth level</option> 
	               		<option value="+2">+2</option> 
	               		<option value="Degree">Degree</option> 
	               		<option value="PG">PG</option> 
	               		<option value="Doctorate">Doctorate</option> 
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Specialization <span class="form-required" title="This field is required."></span></label>
			  <input type="text" id="edit-name" name="edudescr" value="" size="60" maxlength="60" class="form-text">
		    </div>
		     <div class="form-group col-sm-2">
		      <label for="edit-name">Body type<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="bodytype">
	                    <option value="Slim">Slim</option>
	                    <option value="Fat">Fat</option> 
	               		<option value="Average">Average</option> 
	                </select>
			    </div>
		    </div>
		     <div class="form-group col-sm-2">
		      <label for="edit-name">Physical Status<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="physicalstatus">
	                    <option value="No Problem">No Problem</option>
	                    <option value="Blind">Blind</option> 
	               		<option value="Deaf">Deaf</option> 
	                </select>
			    </div>
		    </div>
           
            <div class="form-group col-sm-2">
		      <label for="edit-name">Drinks<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="drink">
	                    <option value="No">No</option>
	                    <option value="Yes">Yes</option> 
	               		<option value="Sometimes">Sometimes</option> 
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Smoke<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="smoke">
	                    <option value="No">No</option>
	                    <option value="Yes">Yes</option> 
	               		<option value="Sometimes">Sometimes</option>
	                </select>
			    </div>
		    </div>
		    
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Mother Tounge<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="mothertounge">
	                    <option value="Malayalam">Malayalam</option>
	                    <option value="Hindi">Hindi</option> 
	               		<option value="English">English</option> 
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Blood Group<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="bloodgroup" value="<?php echo $bloodgroup;?>">
	                    <option value="O +ve">O +ve</option>
	                    <option value="O -ve">O -ve</option> 
	               		<option value="AB -ve">AB -ve</option> 
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Weight <span class="form-required" title="This field is required."></span></label>
			  <input type="text" id="edit-name" name="weight" value="" size="60" maxlength="60" class="form-text">
		    </div>
		  
		    <div class="col-lg-12">
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Height <span class="form-required" title="This field is required."></span></label>
			  <input type="text" id="edit-name" name="height" value="" size="60" maxlength="60" class="form-text">
		    </div>
		   	<div class="form-group col-sm-2">
		      <label for="edit-name">Colour<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="colour">
	                    <option value="Dark">Dark</option>
	                    <option value="Fair">Fair</option> 
	               		<option value="Normal">Normal</option> 
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Diet<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="diet">
	                    <option value="Veg">Veg</option>
	                    <option value="Non Veg">Non Veg</option> 
	               		
	                </select>
			    </div>
		    </div>
		     <div class="form-group col-sm-2">
		      <label for="edit-name">Occupation <span class="form-required" title="This field is required."></span></label>
			  <input type="text" id="edit-name" name="occupation" value="" size="60" maxlength="60" class="form-text">
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Occupation Descr <span class="form-required" title="This field is required."></span></label>
			  <input type="text" id="edit-name" name="occupationdescr" value="" size="130" maxlength="120" class="form-text">
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="edit-name">Annual Income <span class="form-required" title="This field is required."></span></label>
			  <input type="text" id="edit-name" name="income" value="" size="60" maxlength="60" class="form-text">
		    </div>
		   
		   
		    
</div>


           <div class="col-lg-12">
            <div class="form-group col-sm-3">
		    		<label for="edit-name">Fathers Occupation <span class="form-required" title="This field is required."></span></label>
			  		<input type="text" id="edit-name" name="fatheroccupation" value="" size="60" maxlength="500" class="form-text">
		   </div>
           <div class="form-group col-sm-3">
		      <label for="edit-name">Mothers Occupation <span class="form-required" title="This field is required."></span></label>
			  <input type="text" id="edit-name" name="motheroccupation" value="" size="60" maxlength="500" class="form-text">
		    </div>
		    
          <div class="form-group col-sm-3">
		      <label for="edit-name">No . Of sisters<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="sis">
	                    <option value="1">1</option>
	                    <option value="2">2</option> 
	                    <option value="3">3</option> 
	                    <option value="4">4</option> 
	                    <option value="5">5</option> 	
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-3">
		      <label for="edit-name">No . Of brothers<span class="form-required" title="This field is required.">*</span></label>
			    <div class="select-block1">
	                <select name="bros">
	                    <option value="1">1</option>
	                    <option value="2">2</option> 
	                    <option value="3">3</option> 
	                    <option value="4">4</option> 
	                    <option value="5">5</option> 	
	                </select>
			    </div>
		    </div>
		    <div class="form-group">
		    	<label for="about me">About Me<span class="form-required" title="This field is required.">*</span></label>
		    	<textarea rows="5" name="aboutme" value="<?php echo $aboutme; ?>"  class="form-text"></textarea>
		    </div>
		    <div class="form-actions">
			    <input type="submit" id="edit-submit" name="op" value="Submit" class="btn_1 submit">
			  </div>
			  </div>
         <hr/>
			  

		 </form>
	  </div>
	 
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>


<?php include_once("footer.php");?>

</body>
</html>	