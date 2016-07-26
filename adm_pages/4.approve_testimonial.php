<?php 
    $page_title = 'testimonial list'; 
    include('../includes/header_login.php');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		require ('../connect.php'); // Connect to the db
		
		// Make the query:
		$mysql = "SELECT id_testemonials FROM testimonials";
		$result = mysqli_query ($db, $mysql); // Run the query.
	    
	    while ($row = mysqli_fetch_array($result)) {
	        $id = $row['id_testemonials'];
	        
	        	$sql = "UPDATE testimonials SET is_approved='".$_POST[$id]."' WHERE id_testemonials = ".$id;
            	$res = mysqli_query ($db, $sql);
    	}
	
			// Print a message:
			echo '<h1>The testimonial was update successfully</h1>';	
	
			echo '<p><a class="goback" href="1.home_adm.php">Go to home page</a></p>';
		
		mysqli_close($db); // Close the database connection.
		
		// Include the footer and quit the script:
		include ('../includes/footer.php'); 
		exit();
    } // End of the main Submit conditional.
    
    require ('../connect.php');
    
    $sql = "SELECT * FROM testimonials";

	$res = mysqli_query ($db, $sql);
	
	echo  "<h1>Testimonial made</h1>"; 
    
    if (mysqli_num_rows($res) !== 0){
        echo '<form class="testimonial" action="" method="post">';
         
        echo '<table class="testimonial">
                <tr>
                    <th>TITLE</th>
                    <th>TESTIMONIAL</th>
                    <th>APPROVAL</th>
                </tr>';
                
        while ($row = mysqli_fetch_array($res)) {
	            echo '<tr>
			            <td>'. $row['title'].'</td>
			            <td class="description">' . $row['detail'] .'</td>';
	        	if ($row['is_approved'] == 'NOT'){
				    echo "<td><input type='RADIO' name='".$row['id_testemonials']."' value='NOT' checked='checked'/> NOT</br>";
			    	echo "<input type='RADIO' name='".$row['id_testemonials']."' value='YES'/> YES </td>";
	        	} else {
			    	echo "<td> <input type='RADIO' name='".$row['id_testemonials']."' value='NOT' /> NOT </br>";
			    	echo "<input type='RADIO' name='".$row['id_testemonials']."' value='YES' checked='checked'/> YES </td>";	
		    	}
		    	 echo '<td class="delete"><a href="4.delete_testimonial.php?id='.$row['id_testemonials'].'">Delete</a></td>';
		echo '</tr>';
        }
    }else{
    	echo "<p>There is not testimonial at the moment</p>";
    }
    	echo '</table>';
        echo '<button class="update_testi" type="submit">UPDATE</button>';
        echo '</form>';
    	echo '<a class="goback" href="1.home_adm.php">Go back</a>';
        mysqli_close($db); // Close the database connection.

    include('../includes/footer.php'); 
?>