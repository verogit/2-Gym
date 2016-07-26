<?php $page_title = 'home_admin'; include('../includes/header_login.php');
    echo '<div class="welcome">';
    
    require ('../connect.php');
	
	$sql= "SELECT first_name, last_name FROM user WHERE username= '".$_SESSION['login_user']."'";
    $res= mysqli_query($db,$sql);
        
	$row=mysqli_fetch_assoc($res);

	echo '<img id="imagesHomeAdmin" src="../images/gymer-1126999_960_720.jpg" alt="images"></img>';

	echo "<h2>WELCOME</h2>";
	echo '<p>'.strtoupper ($row['first_name']." ".$row['last_name']).'</p>';
		
	mysqli_close($db); // Close the database connection.
	
	echo '</div>';
include('../includes/footer.php'); ?>