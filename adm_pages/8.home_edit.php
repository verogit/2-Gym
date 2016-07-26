<?php # Ullman Advanced -  register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Update page';
include ('../includes/header_login.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		require ('../connect.php'); // Connect to the db
		
		// Make query data save
	
		// Make the query:
		
		$mysql = "UPDATE page SET feature1 = '" . $_POST["feature1"] . "', feature2 = '". $_POST["feature2"]."' WHERE id_page = 1";
		$result = mysqli_query ($db, $mysql);
		
		if ($result) { // If it ran OK.

			// Print a message:
			echo '<h1>The features were update successfully</h1>';
			echo '<p><a class="new" href="8.view_pages.php">Edit another page</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($db) . '<br /><br />Query: ' . $mysql . '</p>';
						echo '<p><a class="new" href="8.view_pages.php">Edit another page</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';

				
		} // End of if ($r) IF.
		
		mysqli_close($db); // Close the database connection.
		
		// Include the footer and quit the script:
		include ('../includes/footer.php'); 
		exit();
	
	} 

//retrieve page information
require ('../connect.php');
echo '<h1>Update Feature Home Page</h1>';
$sql = "SELECT * FROM page WHERE id_page=1";
$result = mysqli_query ($db, $sql);
$rowpage = mysqli_fetch_array($result);
	if (mysqli_num_rows($result) == 1) { 
	// Get the page's information:
	echo "<form action='' method='post'>
    		<table class='form'>
				<tr>
					<td>FEATURE 1:</td>
					<td><textarea name='feature1' rows ='15'>".$rowpage['feature1']."</textarea></td></td>
				</tr>
				<tr>
					<td>FEATURE 2:</td>
					<td><textarea name='feature2' rows ='15'>".$rowpage['feature2']."</textarea></td></td>
				</tr>
              </table>
    	<p><input type='submit' name='submit' value='Update' /></p>
        </form>";
	}	
 echo '<a class="goback" href="8.view_pages.php">Go back</a>';
 include('../includes/footer.php');
 ?>