<?php 
    $page_title = 'see_time'; 
    include('../includes/header_login_member.php');

        require ('../connect.php');
        
	$sql = "SELECT time_class.id_time, time_class.id_teacher, time_class.days, time_class.hour, time_class.duration, teacher.first_name, teacher.last_name
			FROM time_class JOIN teacher ON time_class.id_teacher = teacher.id_teacher
			WHERE id_class=".$_POST['class'];
	$res = mysqli_query ($db, $sql);
	
	 echo  "<h1>Timetable Classes</h1>"; 
	
if (mysqli_num_rows($res) !== 0){
	
	echo '<table class="bookingTime">
	    <tr>
	        <th>DAY</th>
	        <th>TIME</th>
	        <th>DURATION</th>
	        <th>TEACHER</th>
	        <th></th>
	    </tr>';

	while ($time = mysqli_fetch_array($res)) {
		echo '<tr>
			<td>'. $time['days'].'</td>
			<td>'.$time['hour'].'</td>
			<td>'.$time['duration'].'mins</td>
			<td>'.$time['first_name'].' '.$time['last_name'].'</td>
		    <td><a class="bookingTime" href="book.php?id=' .$time['id_time'] . '">Booking</a></td>
		</tr>';
    	}
    echo '</table>';
}else{
	echo "<p>Sorry at this moment We have not any class scheduled</p>";
} 
    mysqli_close($db); // Close the database connection.

?>

<a class="goback" href="2.booking_class.php">Go back</a>
<p class="marginbooking"></p>
<?php include('../includes/footer.php'); ?>

