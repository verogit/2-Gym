<?php $page_title = ' Delete Teacher'; include ('../includes/header_login.php'); 

echo'<h1>Delete Teacher</h1>';
// Check for a valid user ID, through GET or POST:write code

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_classes.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error. Please select a teacher to delete from the <a href="view_teachers.php">view teachers</a> page.</p>';
	include ('../includes/footer.php'); 
	exit();
}

require ('../connect.php');
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['sure'] == 'Yes') { // Delete the record.
    // Make the query:
	
		$sql = "DELETE FROM teacher WHERE id_teacher=$id LIMIT 1";		
		$result = @mysqli_query ($db, $sql);
		if (mysqli_affected_rows($db) == 1) { // If it ran OK.
        	// Print a message:
			echo '<p>The teacher has been deleted.</p>';	
			echo '<p><a class="new" href="6.view_teachers.php">Go back to the list</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';
   		} else { // If the query did not run OK.
			echo '<p class="error">The teacher could not be deleted due to a system error.</p>'; // Public message.
			echo '<p>' . mysqli_error($db) . '<br />Query: ' . $sql . '</p>'; // Debugging message.
		}
	}else { // No confirmation of deletion.
		echo '<p>The teacher has NOT been deleted.</p>';
					echo '<p><a class="new" href="6.view_teachers.php">Go back to the list</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';
	 } 
}else{// show the form:
    // Retrieve the class's information:
    $sql = "SELECT first_name, last_name  FROM teacher WHERE id_teacher=$id";
	$result = @mysqli_query ($db, $sql);

    if (mysqli_num_rows($result) == 1) { // Valid user ID, show the form.

		// Get the class information:
		$row = mysqli_fetch_array ($result);
		// Display the record being deleted:
		echo '<h3>Name:'. $row['first_name'].' '.$row['last_name'].' </h3> Are you sure you want to delete this teacher?';
		// Create the form:
		echo '<form action="" method="post">
				<input type="radio" name="sure" value="Yes" /> Yes 
				<input type="radio" name="sure" value="No" checked="checked" /> No
				<input type="submit" name="submit" value="Delete" />
				<input type="hidden" name="id" value="' . $id . '" />
			</form>';
			
	
	} else { // Not a valid user ID.
		echo '<p class="error">This page has been accessed in error.</p>';
	}

} // End of the main submission conditional.

mysqli_close($db);

include ('../includes/footer.php');
?>

