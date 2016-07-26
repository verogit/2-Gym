<?php # Ullman Advanced -  register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Class_create';
include ('../includes/header_login.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a title:
	if (empty($_POST['class_name'])) {
		$errors[] = 'You forgot to enter the class name.';
	}
	
	// Check for a description:
	if (empty($_POST['description'])) {
		$errors[] = 'You forgot your description.';
	}

	if (empty($errors)) { // If everything's OK.
	
		require ('../connect.php'); // Connect to the db
		
		// Make query data save
	
		// Make the query:
		$mysql = "INSERT INTO class VALUES (NULL, '" . $_POST["class_name"] . "', '". $_POST["description"]."')";
		$result = mysqli_query ($db, $mysql);
		
		
		if ($result) { // If it ran OK.

			// Print a message:
			echo '<h1>The class was added successfully</h1>';	
			echo '<p><a class="new" href=5.class_create.php>Add a new one</a></p>';
			echo '<p style="margin-top:5%;"></p>';
			echo '<p><a class="new" href="5.view_classes.php">Go back to the list</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			
	
			// Debugging message:
			echo '<p>' . mysqli_error($db) . '<br /><br />Query: ' . $mysql . '</p>';
			
						echo '<p><a class="new" href="5.view_classes.php">Go back to the list</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';
			
				
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
<h1>Create a new Class</h1>
<form action="" method="post">
    	<table class="form">
			<tr>
			<td>Name Class:</td>
			<td><input type="text" name="class_name" size="15" maxlength="20" /></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><textarea name="description" rows ="15"></textarea></td>
		</tr>
	</table>
	<p><input type="submit" name="submit" value="Create" /></p>
</form>
<a class="goback" href="1.home_adm.php">Go back</a>
<?php include ('../includes/footer.php'); ?>
