<?php 
$page_title = 'home_admin'; include('../includes/header_login.php');

	$id = $_GET['id'];
	$class = $_GET['class'];

 echo "<h1>The booking was delete</h1>";
 require ('../connect.php');
    $sql = "DELETE FROM booking WHERE id_booking=".$id;

	$res = mysqli_query ($db, $sql);
?>


    <form id='formbook' action='2.booking_list.php' method='post'>
        <input  type="hidden" name="class" value="<?php echo $class; ?>">  </input>
        
        <button class="booktime" type="submit">Go back to the list of booking</button>
    </form>
	<a class="goback" href="1.home_adm.php">Return to home</a>';

 <?php include('../includes/footer.php');  	?>