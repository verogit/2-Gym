<?php 
    $page_title = 'booking list'; 
    include('../includes/header_login.php');

    require ('../connect.php');
	 echo $_POSTè['class'];
    $sql = "SELECT user.id_user, class.id_class, booking.id_booking, user.first_name, user.last_name, booking.id_time, time_class.days, time_class.hour, class.name_class
			FROM user
			JOIN booking ON booking.id_user = user.id_user 
			JOIN time_class ON booking.id_time = time_class.id_time
			JOIN class ON time_class.id_class = class.id_class
			WHERE class.id_class=".$_POST['class'];
	
	$res = mysqli_query ($db, $sql);
	
	echo  "<h1>Class booking</h1>"; 
    
    if (mysqli_num_rows($res) !== 0){
         
        echo '<table class="bookingTime">
                <tr>
                    <th>NAME</th>
                    <th>CLASS</th>
                    <th>DAY</th>
                    <th>HOUR</th>
                </tr>';
                
        while ($row = mysqli_fetch_array($res)) {
		echo '<tr>
			<td class="name">'. $row['first_name'].' '.$row['last_name'].'</td>
			<td class="class">' . $row['name_class'] . '</td>
			<td>' . $row['days'] . '</td>
			<td>' . $row['hour'] . '</td>
		    <td class="delete"><a href="3.delete_class_list.php?id='.$row['id_booking'].'&class='.$row['id_class'].'">Delete</a></td>
		</tr>';
    	}
    	
    	echo '</table>';
    }else{
        echo '<p>There are no booking for that class</p>';
        echo '<p class="marginNObooking"></p>';
    }
    	echo '<a class="goback" href="2.booking_list_class.php">Go back</a>';
        mysqli_close($db); // Close the database connection.

    include('../includes/footer.php'); 

?>