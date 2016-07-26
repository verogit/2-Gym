	<?php
		session_start();
		
	   	if(!isset($_SESSION['login_user']) || ($_SESSION['login_user'] !== 'admin')){
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
            
      	<div id="navigation">
      <ul>
 		<li><a href="2.booking_list_class.php">Booking List</a></li>
		<li><a href="3.list_contact_us.php">List of Contact Us</a></li>
		<li><a href="4.approve_testimonial.php">Approve Testimonials</a></li>
 		<li><a href="5.view_classes.php">Manage Class</a></li>
		<li><a href="6.view_teachers.php">Manage Teacher</a></li>
		<li><a href="7.view_membership.php">Manage Membership</a></li>
 		<li><a href="8.view_pages.php">Manage Page</a></li>
 		<li><a href="9.upload_image.php">Upload Images</a></li>
	</ul>
	</div>
            
            <div id="content">
