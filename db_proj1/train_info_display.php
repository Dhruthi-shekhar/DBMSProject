<?php
    require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<h2>Trains from your start station to destination</h2>
<style>
h2 {
    color: black;
    font-family:courier ;
    font-size: 200%;
    text-align:center;
}
table  {
    color: blue;
    font-family: verdana;
    font-size: 100%;
    font-style:oblique;
text-align:center;
}
</style>

</head>
<body>

 <table>
            <tr><th>TRAIN ID</th><th>TRAIN NAME</th><th>UP TIME</th><th>DOWNTIME</th><th>FARE CLASSI</th><th>FARE CLASSII</th><th>FARE CLASSIII</th></tr>
 <?php
    $src_id=$_GET['source'];
    $dest_id=$_GET['destination'];
    $date_ava=$_GET['date'];
  
    $train_info="select * from TRAIN T,TRAIN_AVAILABILITY TA,TRAIN_ROUTES TR where T.Source_Station='$src_id' and T.Destination_Station = '$dest_id' and T.Train_ID=TR.Train_ID and T.Train_ID=TA.Train_ID and Available_Days='$date_ava'and TR.Source_Station='$src_id' and TR.Destination_Station = '$dest_id'";
    $result = mysqli_query($con,$train_info);

    

    while($row= mysqli_fetch_array($result)){
            echo "<tr><td>".$row["Train_ID"]."</td><td>".$row["Train_Name"]."</td><td>".$row["Source_Station_Time"]."</td><td>".$row["Destination_Station_Time"]."</td><td>".$row["Fare_class1"]."</td><td>".$row["Fare_class2"]."</td><td>".$row["Fare_class3"]."</td></tr>";
    }
?>           
        </table> 
        <form class="myform" action="enter_pass_details.php" method="get">
        <label><b>TRAIN NUMBER:</b></label><br><br>
   	<input name="train_id" type="text" class="inputvalues" placeholder="Type train number"/><br>
	<label><b>Date:</b></label><br><br>
	<input required  name="dateava" type = "text" value=<?php echo $date_ava; ?> />
    <a href="enter_pass_details.php"><input name="submit" type="submit" id="login_btn" value="BOOK"/></a><br><br>
</body>
</html>
