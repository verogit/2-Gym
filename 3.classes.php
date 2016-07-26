<?php 
 $page_title = 'Classes'; include ('includes/header.php'); 
 require ('connect.php');

 $sql="SELECT * FROM class";    
 $result = mysqli_query ($db, $sql);

 echo  "<h1>Classes</h1>"; 

 echo 
  '<table class="tableclass">
    <tr>
     <th>Class name</th>
     <th>Description</th>
   </tr>';
   
 while ($row = mysqli_fetch_array($result)) {
	 echo 
	  '<tr>
			  <td class="name">'. $row['name_class'].'</td> 
			  <td class="description">' . $row['description'] . '</td> 
		</tr>';
 }
 
 echo '</table>';
 
 echo '<a class="time" href="3.see_timetable.php">See timetable >>></a>';
  
 mysqli_close($db); // Close the database connection. 
 include ('includes/footer.php');
?>


