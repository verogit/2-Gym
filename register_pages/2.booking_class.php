<?php 
    $page_title = 'booking_class'; 
    include('../includes/header_login_member.php');

        require ('../connect.php');
    echo '<h1>Booking a class</h1>';
        
    $sql="SELECT * FROM class";
	$res = mysqli_query ($db, $sql);
	
	echo "<form id='formbook' action='2.see_time.php' method='post'>
         <select class='booktime' name='class'>";
	
    while ($row = mysqli_fetch_array($res)) {
		echo '<option value="'.$row["id_class"].'">'.$row["name_class"].'</option>';
    }
	    echo '</select>
	    <button class="booktime" type="submit">SEE TIMETABLE</button>
    </form>';
    
    mysqli_close($db); // Close the database connection.
?>
<a class="goback" href="1.home_member.php">Go back</a>
<p class="marginbooking"></p>
<?php include('../includes/footer.php'); ?>