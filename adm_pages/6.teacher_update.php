<?php $page_title = ' Update Teacher'; include ('../includes/header_login.php'); 

echo'<h1>Update Teacher</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('../includes/footer.php'); 
	exit();
}

require ('../connect.php'); 

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array();
	
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter the teacher first name.';
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter the teacher last name.';
	}
	
	// Check for an telephone number:
	if (empty($_POST['phone_number'])) {
		$errors[] = 'You forgot to enter the teacher telephone number.';
	}
	
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter the teacher email address.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
			// Make the query:
			$sql = "UPDATE teacher SET first_name='".$_POST['first_name']."', last_name='".$_POST['last_name']."', phone_number='".$_POST['phone_number']."', email='".$_POST['email']."' WHERE id_teacher=".$_GET['id']." LIMIT 1";
			$result = @mysqli_query ($db, $sql);
			if ($result) { // If it ran OK.

				// Print a message:
				echo '<p>The teacher has been edited.</p>';	
				echo '<p><a class="new" href="6.view_teachers.php">Change another one</a></p>';
				echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
				echo '<p class="margenclass"></p>';
				
			} else { // If it did not run OK.
				echo '<p class="error">The teacher could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($db) . '<br />Query: ' . $sql . '</p>'; // Debugging message.
			}
					
		mysqli_close($db); // Close the database connection.
		
		// Include the footer and quit the script:
		include ('../includes/footer.php'); 
		exit();
				
		} else { // Report the errors.

			echo '<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg) { // Print each error.
				echo " - $msg<br />\n";
			}
				echo '</p><p>Please try again.</p>';
			
		}
} // End of if (empty($errors)) IF.


// Always show the form...

// Retrieve the teacher's information:
$sql = "SELECT first_name, last_name, phone_number, email FROM teacher WHERE id_teacher=$id";		
$result = @mysqli_query ($db, $sql);

if (mysqli_num_rows($result) == 1) { // Valid user ID, show the form.

	// Get the teacher's information:
	$row = mysqli_fetch_array ($result);
	
	// Create the form:
	echo '<form action="" method="post">
			<p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="' . $row[0] . '" /></p>
			<p>Last Name: <input type="text" name="last_name" size="15" maxlength="30" value="' . $row[1] . '" /></p>
			<p>Telephone number: <input type="phone" name="phone_number" size="20" maxlength="20" value="' . $row[2] . '"  /> </p>
			<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="' . $row[3] . '"  /> </p>
			<p><input type="submit" name="submit" value="Update" /></p>
			<input type="hidden" name="id" value="' . $id . '" />
		</form>';

} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($db);
		
include ('../includes/footer.php');
?>