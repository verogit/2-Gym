<?php 
	$id = $_GET['id'];

    require ('../connect.php');
    $sql = "DELETE FROM page WHERE id_page=".$id;

	$res = mysqli_query ($db, $sql);
    header("location: 8.view_pages.php");
?>

