<?php 

$page_title = 'Contact Us';
include ('includes/header.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a  name:
	if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your name.';
	}
		// Check for a phone_number:
	if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter your phone number.';
	}
	
	// Check for an email:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email.';
	}
	// Check for an message:
	if (empty($_POST['message'])) {
		$errors[] = 'You have to enter your message.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		
		require ('connect.php'); // Connect to the db
		
		// Make query data save
	
		// Make the query:
		$mysql = "INSERT INTO contact_us VALUES ('null', '". $_POST["name"]. "', '". $_POST["phone"]. "', '".$_POST["email"]."', '".$_POST["message"]."')";
		$result = mysqli_query ($db, $mysql); // Run the query.
		
		if ($result) { // If it ran OK.
			// Print a message:
			echo '<h1>Thank you for writing to us!</h1>
			<p>We will contact you soon. </p><p><br /></p>';	
		} else { // If it did not run OK.
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not send your information due to a system error. We apologize for any inconvenience.</p>'; 
	
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
<h1>Contact Us</h1>
<form action="5.contact_us.php" method="post">
	<table>
		<tr>
			<td>Name:</td>
			<td><input class="info" type="text" name="name" size="15" maxlength="20" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></td>
		</tr>
		<tr>
			<td>Phone Number:</td>
			<td><input class="info" type="text" name="phone" size="20" maxlength="60" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"  /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input class="info" type="email" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /></td>
		</tr>
		<tr>
			<td>Message:</td>
			<td><textarea class="info" name="message" rows ="10"  value="<?php if (isset($_POST['message'])) echo $_POST['message']; ?>"></textarea></td>
		</tr>
	</table>
		<p><input class="submit" type="submit" name="submit" value="Send" /></p>
</form>
<?php include ('includes/footer.php'); ?>
