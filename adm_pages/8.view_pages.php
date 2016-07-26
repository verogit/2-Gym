<?php 
    $page_title = 'view the current memberships';    
    include('../includes/header_login.php');
    echo '<h1>Manage Page</h1>';
	require ('../connect.php');
 
 	echo "<a class='new' href='8.new_page.php'>CREATE NEW PAGE</a>";
 	 	echo "<a class='new' href='8.home_edit.php'>EDIT HOME FEATURE</a>";
        $sql="SELECT * from page WHERE id_page <> 1";
        $result = mysqli_query ($db, $sql);
        $num = mysqli_num_rows($result);
         

        if ($num > 0) { // If it ran OK, display the records.

	    	// Table header:
       		echo '<table class="tableclass">
	    			<tr>
						<th>Name</th>
						<th>Information 1</th>
						<th>Image 1</th>
						<th>Information 2</th>
						<th>Image 2</th>
	    			</tr>';
	    	// Fetch and print all the records:
			while ($row = mysqli_fetch_array($result)) {
			    	echo '<tr>
				    		<td>' . $row['page_name'] . '</td>
					    	<td>'.$row['info1'].'</td>
						    <td>' . $row['name_img1'] . '</td>
					    	<td>'.$row['info2'].'</td>
					    	<td>' . $row['name_img2'] . '</td>
					    	<td class="edit"><a href="8.update_page.php?id='. $row['id_page'].'">Edit</a></td>
		    		    	<td class="delete"><a href="8.delete_page.php?id=' . $row['id_page'] . '">Delete</a></td>
				    	</tr>';
			}
			echo '</table>';
			mysqli_free_result ($result);	
	
		} else { // If no records were returned.
			echo '<p class="error">There are currently no registered new page.</p>';
		  }

    echo '<a class="goback" href="1.home_adm.php">Go back</a>';
    mysqli_close($db); // Close the database connection.
    include('../includes/footer.php'); 
?>