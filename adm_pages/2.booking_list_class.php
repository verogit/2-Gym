<?php 
    $page_title = 'booking list'; 
    include('../includes/header_login.php');
    
    require ('../connect.php');
           
    echo "<h1>Please select the classs</h1>";
    $sql="SELECT * FROM class";
	$res = mysqli_query ($db, $sql);
	
	echo "<form id='formbook' action='2.booking_list.php' method='post'>
         <select name='class'>";
	
    while ($row = mysqli_fetch_array($res)) {
		echo '<option value="'.$row["id_class"].'">'.$row["name_class"].'</option>';
    }

	    echo '</select>
	    <button class="booktime" type="submit">Search</button>
    </form>';
        echo '<p class="marginBookingClass"></p>';
  include('../includes/footer.php');  
?>