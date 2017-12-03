<?php
	require 'dbconfig/config.php';
?>
<!doctype html>
<html>
<head>
    <title>DISPLAY TICKET</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css">
    body {
        background-color: #f0f0f2;
        margin: 0;
        padding: 0;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        
    }
    div {
        width: 600px;
        margin: 5em auto;
        padding: 50px;
        background-color: #fff;
        border-radius: 1em;
    }
    a:link, a:visited {
        color: #38488f;
        text-decoration: none;
    }
    @media (max-width: 700px) {
        body {
            background-color: #fff;
        }
        div {
            width: auto;
            margin: 0 auto;
            border-radius: 0;
            padding: 1em;
        }
    }
    </style>    
</head>

<body>
<div>
    <h1>Your Ticket</h1>
    	<?php
		
		$fname=$_GET['fullname'];
		$email=$_GET['email'];
		$query1="Select * from PASSENGER_DETAILS where Passenger_Name='$fname' and Email_ID='$email'";
		$query1_run=mysqli_query($con,$query1);
		
		if(mysqli_num_rows($query1_run) )
		{
		for ($x = 0; $x < mysqli_num_rows($query1_run) ; $x++) {
		echo ($x+1).".";
		$pd=mysqli_fetch_array($query1_run);
		echo "Passenger Name:".$pd['Passenger_Name']."<br>"; 
		echo "Passenger Number:".$pd['Passenger_No']."<br>";
		echo "Age:".$pd['Age']."<br>";
		echo "Gender:";
		$genderr=$pd['Gender'];
		if($genderr == 'f')
		{
			echo "Female<br>";
		}
		if($genderr == 'm')
		{
			echo "Male<br>";
		}
		else
		{
			echo "Others<br>";
		}	
		echo "Disability:";
		$dis=$pd['Disability'];
		if($dis == 'y')
		{
			echo "YES<br>";
		}
		else
		{
			echo "No<br>";
		}
		echo "Email id:".$pd['Email_ID']."<br>";
		echo "Source Station:".$pd['Source_Station']."<br>";
		echo "Destination Station:".$pd['Destination_Station']."<br>";
		}
		}
		else
		{
			echo "Your ticket hasnt been registered try again";
			
		}
	?>
	<a href="home_page.html" ><input name="BACKHOME" type="submit" id="login_btn" value="BACK TO HOME"/></a><br><br>
</div>
	
</body>
</html>
