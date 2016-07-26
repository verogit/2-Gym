<?php 
    $page_title = 'view the current teachers';    
    include('../includes/header_login.php');
    echo '<h1>Manage Teacher</h1>';
    echo "<a class='new' href='6.teacher_add.php'>CREATE NEW TEACHER</a>";
require ('../connect.php');
 
        $sql="SELECT id_teacher, first_name, last_name, phone_number, email FROM teacher"; 
         $result = mysqli_query ($db, $sql);
         $num = mysqli_num_rows($result);
         

        if ($num > 0) { // If it ran OK, display the records.
	       	echo '<table class="tableclass">
			    <tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Phone Number</th>
					<th>Email</th>
				</tr>';
		    	// Fetch and print all the records:
			while ($row = mysqli_fetch_array($result)) {
				echo '<tr>
						<td>' . $row['first_name'] . '</td>
						<td>' . $row['last_name'] . '</td>
						<td>' . $row['phone_number'] . '</td>
						<td>' . $row['email'] . '</td>
						<td class="edit"><a href="6.teacher_update.php?id='. $row['id_teacher'].'">Edit</a></td>
		    			<td class="delete"><a href="6.teacher_delete.php?id=' . $row['id_teacher'] . '">Delete</a></td>
					</tr>';
			}
			echo '</table>';
			mysqli_free_result ($result);	
		} else { // If no records were returned.
			echo '<p class="error">There are currently no registered teachers.</p>';
		}

    echo '<a class="goback" href="1.home_adm.php">Go back</a>';
	mysqli_close($db); // Close the database connection.
    include('../includes/footer.php'); 
?>