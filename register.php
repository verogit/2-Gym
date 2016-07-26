<?php # Ullman Advanced -  register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include ('includes/header.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} 
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} 
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = trim($_POST['pass1']);
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		require ('connect.php'); // Connect to the db
		
		// Make query data save
	
		// Make the query:
		$mysql = "INSERT INTO user VALUES (NULL,'user', '" . $_POST["first_name"] . "', '". $_POST["last_name"]."', '". $_POST["phone"]. "', '". $_POST["email"]. "', '". $_POST["username"]."', '".$_POST["pass1"]."')";
		$result = mysqli_query ($db, $mysql); // Run the query.
		if ($result) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered. </p><p><br /></p>';	

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($db) . '<br /><br />Query: ' . $mysql . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($db); // Close the database connection.
		
		// Include the footer and quit the script:
		include ('includes/footer.php'); 
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
<h1>Register</h1>
<form action="register.php" method="post">
	<table class=form>
		<tr>
			<td>First Name:</td>
			<td><input class="info" type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input class="info" type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></td>
		</tr>
		<tr>
			<td>Phone Number:</td>
			<td><input class="info" type="text" name="phone" size="20" maxlength="60" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"/></td>
		</tr>
		<tr>
			<td>Email Address:</td>
			<td><input class="info" type="email" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/></td>
		</tr>
		<tr>
			<td>Username:</td>
			<td><input class="info" type="text" name="username" size="20" maxlength="60" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input class="info" type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"/></td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td><input class="info" type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"/></td>
		</tr>
	</table>
	<p><input class="submit" type="submit" name="submit" value="Register" /></p>
</form>
<?php include ('includes/footer.php'); ?>
