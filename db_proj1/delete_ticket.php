<?php
	require 'dbconfig/config.php';
?>
<!doctype html>
<html>
<head>
    <title>Cancel your ticket</title>

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
    <h1>Enter your details</h1>
    	<form action='delete_ticket.php' method='post'>
		    <label><b>FULL NAME:</b></label><br>
		    <input name="fullname" type="text" class="inputvalues" placeholder="Type your fullname"/><br><br>
		    <label><b>Email:</b></label><br>
		    <input name="email" type="text" class="inputvalues" placeholder="Type your Email address"/><br><br>
		    <a href="home_page.html" ><input name="delete" type="submit" id="login_btn" onclick="myFunction()" value="DELETE" /></a><br><br>	
	</form>
</div>
<?php
		$fname=$_POST['fullname'];
		$email=$_POST['email'];
		
		if(isset($_POST['delete']))
		{
		
		$query1="Select * from PASSENGER_DETAILS where Passenger_Name='$fname' and Email_ID='$email'";
		$query1_run=mysqli_query($con,$query1);
		if(mysqli_num_rows($query1_run) >0)
		{	
			
			$query2="delete from PASSENGER_DETAILS where Passenger_Name='$fname' and Email_ID='$email'";
			$query2_run=mysqli_query($con,$query2);
			echo '<script type="text/javascript"> alert("Your ticket has been cancelled") </script>';
		}
		else
		{
			echo '<script type="text/javascript"> alert("There was no reserved ticket") </script>';
		}
		}
?>

</body>
</html>
