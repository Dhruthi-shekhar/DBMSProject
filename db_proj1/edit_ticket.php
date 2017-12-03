<?php 
	require 'dbconfig/config.php';
?>
<!doctype html>
<html>
<head>
    <title>Confirm your ticket</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />    
</head>

<body>
	<div class="box-top">Confirm Your Ticket</div>
     <div class="box-panel">
     	<center>
    		<form action="display_ticket.php"  method="get">
			<label><b>Passenger Number:<?php $querry_for_pno = "select max(Passenger_No)  from PASSENGER_DETAILS";
  								$querry_for_pno_result = mysqli_query($con,$querry_for_pno);
  								$pno = mysqli_fetch_array($querry_for_pno_result);
  								$passenger_no = $pno['max(Passenger_No)']+1;
								echo $passenger_no; 
						?></b></label><br>
			<label><b>FULL NAME:<?php $fname=$_GET['fullname']; echo $fname; ?></b></label><br>
			
			<input type="hidden" name="fullname" type="text" class="inputvalues" value="<?php $fullname=$_GET['fullname']; echo$fullname; ?>"/>

			<label><b>EMAIL ID:<?php $email=$_GET['email']; echo $email; ?></b></label><br>

			<input type="hidden" name="email" type="text" class="inputvalues" value="<?php $email=$_GET['email']; echo $email; ?>"/>

			<label><b>AGE:<?php $age=$_GET['age']; echo $age; ?></b></label><br>
			<label><b>GENDER:<?php $gender=$_GET['gender']; 
						if ($gender == "f") {
    							echo "Female";
						} elseif ($gender == "m") {
    							echo "Male";
						} else {
    							echo "Other";
						}					
					 ?></b></label><br>
			<label><b>DISABILITY:<?php $disbility=$_GET['disability']; 
							if($disability == 'y'){
								echo "Disabled";
							}
							else {
								echo "Not disabled";
							}						
						 ?></b></label><br>
			<label><b>CLASS:<?php $class=$_GET['classmenu'];
							echo "Class".$class;
					 ?></b></label><br>
			<label><b>TRAIN ID:<?php $trainno=$_GET['trainno']; echo $trainno; ?></b></label><br>
			<?php
				$trainno=$_GET['trainno'];
				$query="Select Train_Name,Source_Station,Destination_Station from TRAIN where Train_ID='$trainno'";
				$query_run=mysqli_query($con,$query);
				$det=mysqli_fetch_array($query_run);
				$tname=$det['Train_Name'];
				$ss=$det['Source_Station'];
				$ds=$det['Destination_Station'];
			?>
			<label><b>TRAIN NAME:<?php echo $tname; ?></b></label><br>
			<label><b>SOURCE STATION:<?php  echo $ss; ?></b></label><br>
			<label><b>DESTINATION STATION:<?php echo $ds; ?></b></label><br>
			<label><b>FINAL FARE:
  <?php 
  				$class=$_GET['classmenu'];
  				$trainno=$_GET['trainno'];
				$query="Select Train_Name,Source_Station,Destination_Station from TRAIN where Train_ID='$trainno'";
				$query_run=mysqli_query($con,$query);
				$det=mysqli_fetch_array($query_run);
				$tname=$det['Train_Name'];
				$ss=$det['Source_Station'];
				$ds=$det['Destination_Station'];
  if($class == 1)
  {
  $fare_query2 = "select Fare_class1 from TRAIN where Train_ID='$trainno' and Source_Station='$ss' and Destination_Station='$ds' ";
  $fare_query_run=mysqli_query($con,$fare_query2);
  $ff=mysqli_fetch_array($fare_query_run);
  $ffare1=$ff["Fare_class1"];echo $ffare1;
  }
  else if($class == 2)
  {
  $fare_query21 = "select Fare_class2 from TRAIN where Train_ID='$trainno' and Source_Station='$ss' and Destination_Station='$ds' ";
  $fare_query_run1=mysqli_query($con,$fare_query21);
  $ff1=mysqli_fetch_array($fare_query_run1);
  $ffare1=$ff1["Fare_class2"];echo $ffare1;
  }
  else
  {
  $fare_query22 = "select Fare_class3 from TRAIN where Train_ID='$trainno' and Source_Station='$ss' and Destination_Station='$ds' ";
  $fare_query_run22=mysqli_query($con,$fare_query22);
  $ff2=mysqli_fetch_array($fare_query_run2);
  $ffare2=$ff2["Fare_class3"];echo $ffare2;
  }		
   
  ?></b></label><br>
	
	<a href="display_ticket.php" ><input name="CONFIRM" type="submit" id="login_btn" value="SUBMIT"/></a><br><br>
	<a href="home_page.html" ><input name="BACKHOME" type="submit" id="login_btn" value="BACK TO HOME"/></a><br><br>
	 
		</form>
	</center>
	<a href="enter_stationnames.php" ><input name="NEW TICKET" type="submit" id="login_btn" value="BOOK NEW TICKET"/></a><br><br>
     </div>
    </div>
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
	 

  $insert_query = "insert into PASSENGER_DETAILS values ('$passenger_no','$fullname','$age','$gender','$disability','$email','$source_s','$dest_s')";
  $res = mysqli_query($con,$insert_query);
  

	$proc_call="call calc_disc('$class','$age','$disability','$trainno','$source_s','$dest_s',@faree)";
	$return_value="select @faree";
	$result_proc_call=mysqli_query($con,$proc_call);
	$result_ret_value=mysqli_query($con,$return_value);
	$result_row=mysqli_fetch_array($result_ret_value);
	$ffaree=$result_row['@faree'];
  $insert_query1 = "insert into PASSENGER_RESERVATION_DETAILS values ('$trainno','$passenger_no','test','$class','$ffaree','$datee')";
  $res1 = mysqli_query($con,$insert_query1);
	$trig_ret="select @stat1,@stat";
	$trig_ret_value=mysqli_query($con,$trig_ret);
	$trig_row=mysqli_fetch_array($trig_ret_value);
	$fstat1=$trig_row[@stat1];
	$fstat=$trig_row[@stat];
	if($fstat1 == 0){
		$newstatus="Confirm";	
	}
	else{
		$newstatus="Waiting";
	}
	if($fstat1==2){
		$newstatus="Cancelled";
	}
	$insert_query1 = "update PASSENGER_RESERVATION_DETAILS set Status='$newstatus' where Train_ID='$trainno' and Passenger_No='$passenger_no'";
  $res1 = mysqli_query($con,$insert_query1);
	echo '<script type="text/javascript"> alert("Your ticket has been confirmed") </script>';
	
	
?>
</body>
</html>

