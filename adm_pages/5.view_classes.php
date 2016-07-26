<?php 
    $page_title = 'view the current classes';    
    include('../includes/header_login.php');
    echo '<h1>Manage classes</h1>';
	require ('../connect.php');
 
 	echo "<a class='new' href='5.class_create.php'>CREATE NEW CLASS</a>";
        $sql="SELECT * from class";
        $result = mysqli_query ($db, $sql);
        $num = mysqli_num_rows($result);
         

        if ($num > 0) { // If it ran OK, display the records.

	    	// Table header:
       		echo '<table class="tableclass">
	    			<tr>
						<th>Name</th>
						<th>Description</th>
	    			</tr>';
	    	// Fetch and print all the records:
			while ($row = mysqli_fetch_array($result)) {
				echo '<tr>
						<td>' . $row['name_class'] . '</td>
						<td>' . $row['description'] . '</td>
						<td class="edit"><a href="5.update_class.php?id='. $row['id_class'].'">Edit</a></td>
		    			<td class="delete"><a href="5.delete_class.php?id=' . $row['id_class'] . '">Delete</a></td>
		    			<td class="timetable"><a href="5.timetable_list.php?id=' . $row['id_class'] . '">TimeTable</a></td>
					</tr>';
			}
			echo '</table>';
			mysqli_free_result ($result);	
	
		} else { // If no records were returned.
			echo '<p class="error">There are currently no registered classes.</p>';
		  }

    echo '<a class="goback" href="1.home_adm.php">Go back</a>';
    mysqli_close($db); // Close the database connection.
    include('../includes/footer.php'); 
?>