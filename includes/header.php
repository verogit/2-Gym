<!DOCTYPE html>
	<html>
	   	<head>
			<title><?php echo $page_title;?></title>
 			<meta charset="utf-8" />
 			<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
	
 			<link rel="stylesheet" type="text/css" href="includes/main.css">
		</head>
		<body>
			<header>
			 	<div id= "navigation1">
		    		<ul>
 						<li><a href="register.php">Register</a></li>
 						<li><a href="login.php">Login</a></li>
		    		</ul>
		    	</div>	
			
				<a href="index.php"><img id="logo" src="images/logo.png" alt="logo"></a>
 				
 				<div id= "header">
 			   		<h1>Super Fitness</h1>
		    		<h2>Be an inspiration</h2>
		    	</div>

			<nav>
 				<div id="navigation2">
		    		<ul>
 						<li><a href="2.membership.php">Membership</a></li>
						<li><a href="3.classes.php">Classes</a></li>
						<li><a href="4.testiminals_list.php">Testimonials</a></li>
 						<li><a href="5.contact_us.php">Contact Us</a></li>
 						<?php
 							require ('connect.php');
 							$sql = "SELECT * from page";
 							$res = mysqli_query ($db, $sql);
 							$row=mysqli_num_rows($res);
 
 							if (count($row) !== 0){
 								while($row = mysqli_fetch_array($res)){
 									if ($row['page_name'] !== 'HOME'){
 										echo '<li><a href="template.php?pageID='.$row['id_page'].'">'.$row['page_name'].'</a></li>';
 									}
 								}
 							}
 						?>
		         	</ul>
             	</div>
             	</nav>
            </header>
            
            <div id="content">