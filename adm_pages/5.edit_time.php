<?php # Ullman Advanced -  register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Update class';
include ('../includes/header_login.php');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a day:
	if (empty($_POST['day'])) {
		$errors[] = 'You forgot to enter the day of the class.';
	}
	
	// Check for a hour:
	if (empty($_POST['hour'])) {
		$errors[] = 'You forgot to enter the hour of the class.';
	}
	
	// Check for a duration:
	if (empty($_POST['duration'])) {
		$errors[] = 'You forgot to enter the duration of the class.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		require ('../connect.php'); // Connect to the db
		
		// Make query data save
	
		// Make the query:
		$mysql = "UPDATE time_class SET id_teacher = '". $_POST["teacher_name"]."', days = '". $_POST["day"]."', hour ='" . $_POST["hour"]."', duration ='".$_POST["duration"]."' 
		        WHERE id_time = ".$_GET['id'];
		$result = mysqli_query ($db, $mysql);
		
		if ($result) { // If it ran OK.

			// Print a message:
			echo '<h1>The time class was update successfully</h1>';	
			echo '<p><a class="new" href=5.timetable_list.php?id='.$_GET['class'].'>Change another one</a></p>';
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
echo '<h1>Update Timetable</h1>';
$sql = "SELECT * FROM time_class WHERE id_time=".$_GET['id'];
$result = mysqli_query ($db, $sql);
$rowtime = mysqli_fetch_array($result);
	if (mysqli_num_rows($result) == 1) { 
	// Get the time_class's information:
	
echo '<form action="" method="post">
    	<table class="form">
		<tr>
			<td>Teacher Name:</td>
        	<td><select name="teacher_name">';
				$sql = "SELECT id_teacher, first_name, last_name FROM teacher";
				$res = mysqli_query ($db, $sql);
					
   				while ($row = mysqli_fetch_array($res)) {
   				    if ($rowtime[id_teacher] == $row[id_teacher]){
   				     echo '<option value="'.$row["id_teacher"].'" selected = "selected">'.$row["first_name"].' '.$row["last_name"].'</option>';  
   				    }
					echo '<option value="'.$row["id_teacher"].'">'.$row["first_name"].' '.$row["last_name"].'</option>';
    			}
    	    echo '</select></td>
	            </tr>
		        <tr>
			        <td>Day:</td>
			        <td><input type="text" name="day" size="15" maxlength="20" value="'.$rowtime['days'].'"/></td>
		        </tr>
		        <tr>
			        <td>Hour:</td>
			        <td><input type="text" name="hour" size="15" maxlength="20" value="'.$rowtime['hour'].'"/></td>
		        </tr>
		        <tr>
			        <td>Duration:</td>
			        <td><input type="text" name="duration" size="15" maxlength="20" value="'.$rowtime['duration'].'"/></td>
		        </tr>
	       </table>
	       <p><input type="submit" name="submit" value="Update" /></p>
        </form>

<a class="goback" href="5.timetable_list.php?id='.$_GET['class'].'">Go back</a>';
}

include ('../includes/footer.php');