<?php 
    $page_title = 'view the current memberships';    
    include('../includes/header_login.php');
    echo '<h1>Manage Membership</h1>';
	require ('../connect.php');
 
 	echo "<a class='new' href='7.create_membership.php'>CREATE NEW MEMBERSHIP</a>";
        $sql="SELECT * from membership";
        $result = mysqli_query ($db, $sql);
        $num = mysqli_num_rows($result);
         

        if ($num > 0) { // If it ran OK, display the records.

	    	// Table header:
       		echo '<table class="tableclass">
	    			<tr>
						<th>Name</th>
						<th>Price (€)</th>
						<th>Description</th>
	    			</tr>';
	    	// Fetch and print all the records:
			while ($row = mysqli_fetch_array($result)) {
				echo '<tr>
						<td>' . $row['name_membership'] . '</td>
						<td>'.$row['price'].'</td>
						<td>' . $row['description'] . '</td>
						<td class="edit"><a href="7.update_membership.php?id='. $row['id_membership'].'">Edit</a></td>
		    			<td class="delete"><a href="7.delete_membership.php?id=' . $row['id_membership'] . '">Delete</a></td>
					</tr>';
			}
			echo '</table>';
			mysqli_free_result ($result);	
	
		} else { // If no records were returned.
			echo '<p class="error">There are currently no registered memberships.</p>';
		  }

    echo '<a class="goback" href="1.home_adm.php">Go back</a>';
    mysqli_close($db); // Close the database connection.
    include('../includes/footer.php'); 
?>