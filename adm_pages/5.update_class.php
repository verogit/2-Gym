<?php # Ullman Advanced -  register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Update class';
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
		
		$mysql = "UPDATE class SET name_class = '" . $_POST["class_name"] . "', description = '". $_POST["description"]."' WHERE id_class=".$_GET['id'];
		$result = mysqli_query ($db, $mysql);
		
		if ($result) { // If it ran OK.

			// Print a message:
			echo '<h1>The class was update successfully</h1>';
			echo '<p><a class="new" href="5.view_classes.php">Change another one</a></p>';
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

}// End of the main Submit conditional.

//retrieve classes information
require ('../connect.php');
echo '<h1>Update Classes</h1>';
$sql = "SELECT * FROM class WHERE id_class=".$_GET['id'];
$result = mysqli_query ($db, $sql);
$row = mysqli_fetch_array($result);
	if (mysqli_num_rows($result) == 1) { 
	// Get the classes's information:
	echo "<form action='' method='post'>
    		<table class='form'>
				<tr>
					<td>Name Class:</td>
					<td><input type='text' name='class_name' size='15' maxlength='20'  value='".$row['name_class']."'/></td>
				</tr>
				<tr>
					<td>Description:</td>
					<td><textarea name='description' rows ='15'>".$row['description']."</textarea></td>
				</tr>
			</table>
			<p><input type='submit' name='submit' value='Update' /></p>
		</form>";
	}	
		echo '<a class="goback" href="1.home_adm.php">Go back</a>';
 include('../includes/footer.php');
 ?>