<?php 
	$id = $_GET['id'];

     require ('../connect.php');
    $sql = "DELETE FROM testimonials WHERE id_testemonials=".$id;

	$res = mysqli_query ($db, $sql);
header("location: 4.approve_testimonial.php");
?>

