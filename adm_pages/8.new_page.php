<?php # Ullman Advanced -  register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'new page';
include ('../includes/header_login.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a page_name:
	if (empty($_POST['page_name'])) {
		$errors[] = 'You forgot to enter page name.';
	}
	
	// Check for a info1:
	if (empty($_POST['info1'])) {
		$errors[] = 'You forgot to enter information 1.';
	}
	// Check for a name_img1:
	if (empty($_POST['name_image1'])) {
		$errors[] = 'You forgot to enter name of the image 1';
	}
	
		// Check for a info2:
	if (empty($_POST['info2'])) {
		$errors[] = 'You forgot to enter information 2.';
	}
	// Check for a name_img2:
	if (empty($_POST['name_image2'])) {
		$errors[] = 'You forgot to enter name of the image 2';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		require ('../connect.php'); // Connect to the db
		
		// Make query data save
	
		// Make the query:
		$mysql = "INSERT INTO page VALUES (NULL, '".$_POST["page_name"]."', '". $_POST["info1"]."', '".$_POST["info2"]."', '".$_POST["name_image1"]."', '". $_POST["name_image2"]."' ,NULL, NULL)";
		$result = mysqli_query ($db, $mysql);
		
		$id = $db->insert_id;

		if ($result) { // If it ran OK.

			// Print a message:
			echo '<h1>Your page was create!</h1>';
			echo '<p><a class="new" href=8.new_page.php>Add a new one</a></p>';
			echo '<p style="margin-top:5%;"></p>';
			echo '<p><a class="new" href="8.view_pages.php">Go back to the list</a></p>';
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
			echo '<p class="margenclass"></p>';

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You page had not been sent due to a system error. We apologize for any inconvenience.</p>'; 
	
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
    
<h1>Create a new page</h1>
<form action="" method="post">
    <table>
        <tr>
            <td>Name of the page:</td>
            <td><input type="text" name="page_name"/></td>
        </tr>
        <tr>
            <td>Information 1:</td>
            <td><textarea name='info1' rows ='15'></textarea></td>
        </tr>
        <tr>
            <td>Name image 1:</td>
            <td>
           	<?php
           		require ('../connect.php');
           		$sql = "SELECT name_image FROM image";
				$res = mysqli_query ($db, $sql);
				
            	echo "<select name='name_image1'>";
	
				while ($row = mysqli_fetch_array($res)) {
					echo '<option value="'.$row["name_image"].'">'.$row["name_image"].'</option>';
    			}
    			echo '</select>';
			?></td>
        </tr>
          <tr>
            <td>Information 2:</td>
            <td><textarea name='info2' rows ='15'></textarea></td>
        </tr>
        <tr>
            <td>Name image 2:</td>
            <td>
           	<?php
           		require ('../connect.php');
           		$sql = "SELECT name_image FROM image";
				$res = mysqli_query ($db, $sql);
				
            	echo "<select name='name_image2'>";
	
				while ($row = mysqli_fetch_array($res)) {
					echo '<option value="'.$row["name_image"].'">'.$row["name_image"].'</option>';
    			}
    			echo '</select>';
			?></td>
        </tr>
    </table>
    	<p><input type="submit" name="submit" value="Create" /></p>
    
    
</form>


 <?php   
        	echo '<a class="goback" href="8.view_pages.php">Go back</a>';
    include('../includes/footer.php'); 
?>