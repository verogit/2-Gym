<?php 
    $page_title = 'list_contact'; 
    include('../includes/header_login.php');

        require ('../connect.php');
    
    $sql="SELECT * FROM contact_us";
    $res = mysqli_query ($db, $sql);
    
    	echo  "<h1>Contact Information </h1>"; 
    
    if (mysqli_num_rows($res) !== 0){
         
        echo '<table class="contact_us">
                <tr>
                    <th>NAME</th>
                    <th>PHONE</th>
                    <th>EMAIL</th>
                    <th>MESSAGE</th>
                </tr>';
                
        while ($row = mysqli_fetch_array($res)) {
		echo '<tr>
			<td>'. $row['name'].'</td>
			<td>' . $row['phone_number'] . '</td>
			<td class="email"><a href="mailto:' . $row['email'] . '">'. $row['email'] .'</a></td>
			<td class="message">' . $row['message'] . '</td>
			 <td class="delete"><a href="3.delete_contact.php?id='.$row['id_contact'].'">Delete</a></td>
		</tr>';
    	}
    	
    	echo '</table>';
    }
    
        mysqli_close($db); // Close the database connection.
        
    	echo '<a class="goback" href="1.home_adm.php">Go back</a>';

    include('../includes/footer.php'); 
?>