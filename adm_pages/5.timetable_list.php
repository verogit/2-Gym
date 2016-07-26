<?php 
    $page_title = 'see_time'; 
    include('../includes/header_login.php');

        require ('../connect.php');
        $id = $_GET['id'];
        
	$sql = "SELECT time_class.id_time, time_class.id_teacher, time_class.days, time_class.hour, time_class.duration, teacher.first_name, teacher.last_name
			FROM time_class JOIN teacher ON time_class.id_teacher = teacher.id_teacher
			WHERE id_class=".$id;
	$res = mysqli_query ($db, $sql);
	
	 echo  "<h1>Timetables</h1>"; 
	  	echo "<a class='new' href='5.create_timetable.php?id=".$id."'>CREATE NEW TIMETABLE</a>";
	
if (mysqli_num_rows($res) !== 0){
	
	echo '<table class="bookingTime">
	    <tr>
	        <th>DAY</th>
	        <th>TIME</th>
	        <th>DURATION</th>
	        <th>TEACHER</th>
	    </tr>';

	while ($time = mysqli_fetch_array($res)) {
		echo '<tr>
			<td>'. $time['days'].'</td>
			<td>'.$time['hour'].'</td>
			<td>'.$time['duration'].'mins</td>
			<td>'.$time['first_name'].' '.$time['last_name'].'</td>
			<td class="edit"><a href="5.edit_time.php?id='.$time['id_time'] . '&class='.$id.'">Edit</a></td>
		    <td class="delete"><a href="5.delete_time.php?id=' .$time['id_time'] . '&class='.$id.'">Delete</a></td>
		</tr>';
    	}
    echo '</table>';
}else{
	echo "<p>Sorry at this moment We have not any class scheduled</p>";
} 
    mysqli_close($db); // Close the database connection.

?>

<a class="goback" href="5.view_classes.php">Go back</a>
<p class="marginbooking"></p>
<?php include('../includes/footer.php'); ?>

