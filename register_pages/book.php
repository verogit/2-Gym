<?php 
    $page_title = 'book'; 
    include('../includes/header_login_member.php');
    
    if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From see_time.php
	    $id_time = $_GET['id'];
    } elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	    $id_time = $_POST['id'];
    } else { // No valid ID, kill the script.
	    echo '<p class="error">This page has been accessed in error.</p>';
	    include ('../includes/footer.php'); 
	    exit();
    }
    
    require ('../connect.php');
    
    $sql = "SELECT id_user FROM user WHERE username = '".$_SESSION['login_user']."'"; 
   	$res = mysqli_query ($db, $sql);
   	
   	$id_user=mysqli_fetch_array($res);
   	

    
    $sql2 = "INSERT INTO booking VALUES (NULL, $id_time, $id_user[0])";  
	
	$res2 = mysqli_query ($db, $sql2);
	
	mysqli_close($db); // Close the database connection.
	
?>
<h1>Thank you!</h1>
<p class="bookmessage">You booking was done. </p>
<img class="imagesbook" src="../images/Class4.jpg"></img>
<a class="goback" href="1.home_member.php">Go back</a>
<?php include('../includes/footer.php'); ?>