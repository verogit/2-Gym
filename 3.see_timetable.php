<?php 
 $page_title = 'timetable'; include ('includes/header.php'); 

 
 function print_day($day){
     require ('connect.php');
     $sql = "SELECT class.name_class, time_class.days, time_class.hour, time_class.duration, teacher.first_name, teacher.last_name
			        FROM time_class 
		            	JOIN teacher ON time_class.id_teacher = teacher.id_teacher
		            	JOIN class ON time_class.id_class = class.id_class
		            	WHERE time_class.days = '".$day."'";
	$res = mysqli_query ($db, $sql);
	
    if (mysqli_num_rows($res) !== 0){
                echo '<table class="tabletime">
	                    <tr>
	                        <th>TIME</th>
	                        <th>CLASS</th>
	                        <th>DURATION</th>
	                        <th>TEACHER</th>
	                   </tr>';
	                   
	    while ($time = mysqli_fetch_array($res)) {
	            echo "<h2>".strtoupper($day)."</h2>";
	           
	       	    echo '<tr>
			            <td>'. $time['hour'].'</td>
			            <td>'.$time['name_class'].'</td>
			            <td>'.$time['duration'].'mins</td>
			            <td>'.$time['first_name'].' '.$time['last_name'].'</td>
	            	</tr>';
	        }
	        echo "</table>";
    } 
	    }
	  
 
 print_day('Monday');
 print_day('Tuesday');
 print_day('Wednesday');
 print_day('Thursday');
 print_day('Friday');
 print_day ('Saturday');
 print_day('Sunday');
 
    
 mysqli_close($db); // Close the database connection. 
 include ('includes/footer.php');
?>


