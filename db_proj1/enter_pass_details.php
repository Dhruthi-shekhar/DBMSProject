<?php

require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title>Passenger Details Page</title>
  <link rel="stylesheet" href="css\style.css">
</head>
<body style="background-color:#7f8c8d">
  <div id="main-wrapper">
    <center><h2>Passenger Details Form</h2>
    </center>
  <form class="myform" action="edit_ticket.php" method="get">
    <label><b>FULL NAME:</b></label><br>
    <input name="fullname" type="text" class="inputvalues" placeholder="type your fullname"/><br><br>
    <label><b>Email:</b></label><br>
    <input name="email" type="text" class="inputvalues" placeholder="type your Email address"/><br><br>
    <label><b>Age:</b></label><br>
    <input name="age" type="text" class="inputvalues" placeholder="type your age as of jan 2017"/><br><br>
    <label><b>Gender:</b></label><br>
  	<input type="radio" name="gender"  value="m">Male
  	<input type="radio" name="gender"  value="f">Female
  	<input type="radio" name="gender"  value="o">TransGender
  	<br><br>
  	<label><b>Disability:</b></label><br>
  	<input type="radio" name="disability"  value="y">Disabled
  	<input type="radio" name="disability"  value="n" checked>Not Disabled
  	<br><br>
  	<select name="classmenu" id="signup_btn">
		<option value="1">Class 1 (Fare:
		<?php 
		$train_id = $_GET['train_id'];
		$querry_for_fare = "select Fare_Class1  from TRAIN where Train_ID='$train_id'";
  		$querry_for_fare_run = mysqli_query($con,$querry_for_fare);
  		$fare_fetch = mysqli_fetch_array($querry_for_fare_run);
		$fare=$fare_fetch['Fare_Class1'];
		echo $fare;
		?> )
		</option>
		<option value="2">Class 2 (Fare:
		<?php 
		
		$querry_for_fare1 = "select Fare_Class2  from TRAIN where Train_ID='$train_id'";
  		$querry_for_fare_run1 = mysqli_query($con,$querry_for_fare1);
  		$fare_fetch1 = mysqli_fetch_array($querry_for_fare_run1);
		$fare1=$fare_fetch1['Fare_Class2'];
		echo $fare1;
		?> )		
		</option>
		<option value="3">Class 3 (Fare:
		<?php 
		
		$querry_for_fare2 = "select Fare_Class3  from TRAIN where Train_ID='$train_id'";
  		$querry_for_fare_run2 = mysqli_query($con,$querry_for_fare2);
  		$fare_fetch2 = mysqli_fetch_array($querry_for_fare_run2);
		$fare2=$fare_fetch2['Fare_Class3'];
		echo $fare2;
		?> )	
		</option>
	</select>
	<br><br>
	<label><b>TRAIN NO.</b></label><br>
    <input name="trainno" type="text" class="inputvalues" value=<?php $train_id = $_GET['train_id']; echo $train_id; ?> /><br><br>
	<label><b>DATE</b></label><br>
    <input name="datee" type="text" class="inputvalues" value=<?php $dateava = $_GET['dateava']; echo $dateava; ?> /><br><br>
    <a href="localhost/db_proj1/edit_ticket.php" ><input name="submit2" type="submit" id="login_btn" value="SUBMIT"/></a><br><br>
</form>
<?php
	

  
  $fullname=$_GET['fullname'];
  $email=$_GET['email'];
  $age=$_GET['age'];
  $gender=$_GET['gender'];
  $disability=$_GET['disability'];
  $class=$_GET['classmenu'];
  $trainno=$_GET['trainno'];
  $datee=$_GET['datee'];

  $querry_for_pno = "select max(Passenger_No)  from PASSENGER_DETAILS";
  $querry_for_pno_result = mysqli_query($con,$querry_for_pno);
  $pno = mysqli_fetch_array($querry_for_pno_result);
  $passenger_no = $pno['max(Passenger_No)']+1;
 	 	
  $querry_for_ssds = "select Source_Station,Destination_Station  from TRAIN where Train_ID='$trainno'";
  $querry_for_ssds_result = mysqli_query($con,$querry_for_ssds);
  $ssds = mysqli_fetch_array($querry_for_ssds_result);
  $source_s = $ssds['Source_Station'];
  $dest_s = $ssds['Destination_Station'];  

 
  if($class == 1)
  {
  $fare_query2 = "select Fare_class1 from TRAIN where Train_ID='$trainno' and Source_Station='$source_s' and Destination_Station='$dest_s' ";
  $fare_query_run=mysqli_query($con,$fare_query2);
  $ff=mysqli_fetch_array($fare_query_run);
  $ffare=$ff["Fare_class1"];
  }
  else if($class == 2)
  {
  $fare_query2 = "select Fare_class2 from TRAIN where Train_ID='$trainno' and Source_Station='$source_s' and Destination_Station='$dest_s' ";
  $fare_query_run=mysqli_query($con,$fare_query2);
  $ff=mysqli_fetch_array($fare_query_run);
  $ffare=$ff["Fare_class2"];
  }
  else
  {
  $fare_query2 = "select Fare_class3 from TRAIN where Train_ID='$trainno' and Source_Station='$source_s' and Destination_Station='$dest_s' ";
  $fare_query_run=mysqli_query($con,$fare_query2);
  $ff=mysqli_fetch_array($fare_query_run);
  $ffare=$ff["Fare_class3"];
  }

  
  
?>

  </div>
</body>
</html>
