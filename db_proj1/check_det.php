<?php
 	require 'dbconfig/config.php';
?>
<!doctype html>
<html>
<head>
    <title>Check Your Ticket</title>

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
    	<form action='display_ticket.php' method='get'>
		    <label><b>FULL NAME:</b></label><br>
		    <input name="fullname" type="text" class="inputvalues" placeholder="Type your fullname"/><br><br>
		    <label><b>Email:</b></label><br>
		    <input name="email" type="text" class="inputvalues" placeholder="Type your Email address"/><br><br>
		    <a href="localhost/db_proj1/display_ticket.php" ><input name="submit" type="submit" id="login_btn" value="SUBMIT"/></a><br><br>	
	</form>

</div>
</body>
</html>
