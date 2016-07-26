	<?php
		session_start();
            

    	if(!isset($_SESSION['login_user'])){
    		header("location: ../index.php");
    	}
	?>
	
<!DOCTYPE html>
	<html>
	   	<head>
			<title><?php echo $page_title; ?></title>
 			<meta charset="utf-8" />
 			<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
	
 			<link rel="stylesheet" type="text/css" href="../includes/main.css">
		</head>
		<body>
			<header>
 				<div id= "navigation1">
		    		<ul>
 						<li><a href="logOut.php">LoginOut</a></li>
		    		</ul>
		    	</div>
		    	
				<img id="logo" src="../images/logo.png" alt="logo">
 				<div id= "header">
 			   		<h1>Super Fitness</h1>
		    		<h2>Be an inspiration</h2>
		    	</div>

            </header>
            
            	<div id="navigation2">
            
                <ul>
 		<li><a href="2.booking_class.php">Booking a Class</a></li>
		<li><a href="3.testimonals.php">Make a Testimonial</a></li>
		<li><a href="4.profile.php">My profile</a></li>
	</ul>
	</div>
	<div id="content">
	
