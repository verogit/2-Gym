<?php 
	$id = $_GET['id'];

     require ('../connect.php');
    $sql = "DELETE FROM contact_us WHERE id_contact=".$id;

	$res = mysqli_query ($db, $sql);
header("location: 3.list_contact_us.php");
?>

