<?php 
    $page_title = 'profile'; 
    include('../includes/header_login_member.php');
    
    require ('../connect.php');
    
	 	$sql= "SELECT * FROM user WHERE username= '".$_SESSION['login_user']."'";
        $res= mysqli_query($db,$sql);
        
		$row=mysqli_fetch_assoc($res);

    echo "<h1>My Profile</h1>";
    echo $_SESSION['message'];
    echo "<form action='update.php' method='post'>";
    echo "<table class='form'>";
        echo "<tr>";
            echo "<td>First Name:</td>";
            echo "<td><input type='text' name='first_name'value='{$row['first_name']}'/></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Last Name:</td>";
            echo "<td><input type='text' name='last_name' value='{$row['last_name']}' /></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Phone Number:</td>";
            echo "<td><input type='text' name='phone' value='{$row['phone_number']}'/></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Email Address:</td>";
            echo "<td><input type='email' name='email' value='{$row['email']}'/></td>";
        echo "</tr>";
    echo "</table>";
       	   echo "<p><button class='update_profile' type='submit'>UPDATE</button> </p>";
   echo "</form>";
   
    mysqli_close($db); // Close the database connection.
?>
<a class="goback" href="1.home_member.php">Go back</a>
<?php include('../includes/footer.php'); ?>