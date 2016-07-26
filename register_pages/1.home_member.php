<?php $page_title = 'home_member'; include('../includes/header_login_member.php'); ?>
    <div class="welcome">
	<img id="imagesHomeMember" src="../images/sneakers-933127_960_720.jpg" alt="images"></img>
	<h2>WELCOME</h2>
	
	 <?php
        require ('../connect.php');
	 	$sql= "SELECT first_name, last_name FROM user WHERE username= '".$_SESSION['login_user']."'";
        $res= mysqli_query($db,$sql);
        
		$row=mysqli_fetch_assoc($res);

		echo '<p>'.strtoupper ($row['first_name']." ".$row['last_name']).'</p>';
		
		mysqli_close($db); // Close the database connection.
 echo '</div>';
    
include('../includes/footer.php'); ?>