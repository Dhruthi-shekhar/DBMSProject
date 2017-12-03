<?php

require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>STATION NAMES PAGE</title>
  <link rel="stylesheet" href="css\style.css">
</head>
<body style="background-color:#7f8c8d">
  <div id="main-wrapper">
    <center><h2>Travel Details Form</h2>
    </center>
  <form class="myform" action="train_info_display.php" method="get">
    <label><b>Start Station:</b></label><br><br>
    <input name="source" type="text" class="inputvalues" placeholder="type your departure station"/><br><br>
    <label><b>Final Destination:</b></label><br><br>
    <input name="destination" type="text" class="inputvalues" placeholder="type your Arrival station"/><br><br>
    <label><b>Date</b></label><br><br>
    <input name="date" type="text" class="inputvalues" placeholder="Enter date in format yyyy-mm-dd"/><br><br>
    <a href="train_info_display.php"><input name="submit" type="submit" id="login_btn" value="SUBMIT"/></a><br><br>
</form>

<?php 
if(isset($_GET['submit']))
{
  	$source=$_GET['source'];
	$destination=$_GET['destination'];
	$dateav=$_GET['date'];

	$query_check_source="select Station_Name from STATIONS where Station_Name='$source'";
	$query_check_destination="select Station_Name from STATIONS where Station_Name='$destination'";

	$query_run1= mysqli_query($con,$query_check_source);
	$query_run2= mysqli_query($con,$query_check_destination);
	$row = mysqli_fetch_array($query_run1);
	$row1 = mysqli_fetch_array($query_run2);
	if(mysqli_num_rows($query_run1)>0 && mysqli_num_rows($query_run2)>0)
	{
 		echo'<script type="text/javascript"> alert("SUCCESS Stations") </script>';
 		header('location:train_info_display.php');
	}
	else {
  		echo'<script type="text/javascript"> alert("Invalid Stations") </script>';
 	}
}
?>



  </div>
</body>
</html>

