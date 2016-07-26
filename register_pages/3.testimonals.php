<?php # Ullman Advanced -  register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Testimonials';
include ('../includes/header_login_member.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a title:
	if (empty($_POST['title'])) {
		$errors[] = 'You forgot to enter title.';
	}
	
	// Check for a testimonals:
	if (empty($_POST['testimonals'])) {
		$errors[] = 'You forgot your testimonals.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		require ('../connect.php'); // Connect to the db
		
		// Make query data save
	
		// Make the query:
		$sql="SELECT id_user FROM user WHERE username='".$_SESSION['login_user']."'";

		$res = mysqli_query ($db, $sql);
		
		$row=mysqli_fetch_assoc($res);
		
		$mysql = "INSERT INTO testimonials VALUES (NULL, ".$row['id_user'].", '" . $_POST["title"] . "', '". $_POST["testimonals"]."', 'NOT')";
		$result = mysqli_query ($db, $mysql); // Run the query.
		if ($result) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you for your testimonal!</h1>';


		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You testimony had not been sent due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($db) . '<br /><br />Query: ' . $mysql . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($db); // Close the database connection.
		
		// Include the footer and quit the script:
				echo '<p class="testimonalMargin"></p>';
		include ('../includes/footer.php'); 
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>
<h1>Testimonals</h1>
<form action="" method="post">
<table class="formas">
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title" size="15" maxlength="20" /></td>
		</tr>
		<tr>
			<td>Testimonals:</td>
			<td><textarea name="testimonals" rows ="10"></textarea></td>
		</tr>
	</table>
	<button class='testimonals' type='submit'>SEND</button>
</form>
<a class="goback" href="1.home_member.php">Go back</a>
<?php include('../includes/footer.php'); ?>