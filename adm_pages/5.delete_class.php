<?php $page_title = ' Delete Classes'; include ('../includes/header_login.php'); 
require ('../connect.php');
echo'<h1>Delete class</h1>';
// Check for a valid user ID, through GET or POST:write code

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_classes.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error. Please select a class to delete from the <a href="view_classes.php">view classes</a> page.</p>';
	include ('../includes/footer.php'); 
	exit();
}

require ('../connect.php');
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['sure'] == 'Yes') { // Delete the record.
    // Make the query:
	
		$sql = "DELETE FROM class WHERE id_class=$id LIMIT 1";		
		$result = @mysqli_query ($db, $sql);
		if (mysqli_affected_rows($db) == 1) { // If it ran OK.
        	// Print a message:
			echo '<p>The class has been deleted.</p>';	
			echo '<p><a class="new" href="5.view_classes.php">Go back to the list</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';
   		} else { // If the query did not run OK.
			echo '<p class="error">The class could not be deleted due to a system error.</p>'; // Public message.
			echo '<p>' . mysqli_error($db) . '<br />Query: ' . $sql . '</p>'; // Debugging message.
		}
	}else { // No confirmation of deletion.
		echo '<p>The class has NOT been deleted.</p>';	
			echo '<p><a class="new" href="5.view_classes.php">Go back to the list</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';
	 } 
}else{// show the form:
    // Retrieve the class's information:
    $sql = "SELECT name_class  FROM class WHERE id_class=$id";
	$result = @mysqli_query ($db, $sql);

    if (mysqli_num_rows($result) == 1) { // Valid user ID, show the form.

		// Get the class information:
		$row = mysqli_fetch_array ($result);
		// Display the record being deleted:
		echo '<h3>Name:'. $row['name_class'].'</h3> Are you sure you want to delete this class?';
		// Create the form:
		echo '<form action="" method="post">
				<input type="radio" name="sure" value="Yes" /> Yes 
				<input type="radio" name="sure" value="No" checked="checked" /> No
				<input type="submit" name="submit" value="Submit" />
				<input type="hidden" name="id" value="' . $id . '" />
			</form>';
	
	} else { // Not a valid user ID.
		echo '<p class="error">This page has been accessed in error.</p>';
	}

} // End of the main submission conditional.

mysqli_close($db);
echo "<p class=marginclassdelete></p>"	;	
include ('../includes/footer.php');
?>

