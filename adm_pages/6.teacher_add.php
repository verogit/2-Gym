<?php # Ullman Advanced -  register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Teacher_add';
include ('../includes/header_login.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter first_name.';
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot your last_name.';
	}
	
	// Check for a phone number:
	if (empty($_POST['phone_number'])) {
		$errors[] = 'You forgot your phone_number.';
	}
	
	// Check for an email:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot your email.';
	}
	if (empty($errors)) { // If everything's OK.
	
		require ('../connect.php'); // Connect to the db
		
		// Make query data save
	
		// Make the query:
		$mysql = "INSERT INTO teacher VALUES (NULL, '" . $_POST["first_name"] . "', '". $_POST["last_name"]."', '". $_POST["phone_number"]."', '". $_POST["email"]."')";
		$result = mysqli_query ($db, $mysql); // Run the query.
		if ($result) { // If it ran OK.

			// Print a message:
			echo '<h1>The teacher was added successfully</h1>';	
			echo '<p><a class="new" href="6.teacher_add.php">Add a new one</a></p>';
			echo '<p style="margin-top:5%;"></p>';
			echo '<p><a class="new" href="6.view_teachers.php">Go back to the list</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($db) . '<br /><br />Query: ' . $mysql . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($db); // Close the database connection.
		
		// Include the footer and quit the script:
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
<h1>Teacher</h1>
<form action="" method="post">
    	<table>
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="first_name" size="15" maxlength="20" /></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="last_name" size="15" maxlength="20"/></td>
		</tr>
		<tr>
			<td>Phone number:</td>
			<td><input type="text" name="phone_number" size="15" maxlength="20"/></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" size="50" maxlength="200"/></td>
		</tr>
	</table>
		<p><input type="submit" name="submit" value="Add" /></p>
</form>
<a class="goback" href="6.view_teachers.php">Go back</a>
<?php include ('../includes/footer.php'); ?>
