<?php $page_title = 'Testimonials'; include ('includes/header.php'); 
require ('connect.php');

    $sql = "SELECT * FROM testimonials";

	$res = mysqli_query ($db, $sql);
	
	echo  "<h1>Testimonials</h1>"; 
	
	echo "<div class='testimonial'>";
    
    if (mysqli_num_rows($res) !== 0){
        
        while ($row = mysqli_fetch_array($res)) {
            if ($row['is_approved'] == 'YES'){
	            echo '<h2>'.$row['title'].'</h2>
			          <p>' . $row['detail'] .'</p>';
            }
        }
    }
    echo "</div>";
mysqli_close($db); // Close the database connection.
 include ('includes/footer.php'); ?>