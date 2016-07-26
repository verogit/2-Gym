<?php 
	$id = $_GET['id'];
	$id_class = $_GET['class'];

    require ('../connect.php');
    $sql = "DELETE FROM time_class WHERE id_time=".$id;

	$res = mysqli_query ($db, $sql);
    header("location: 5.timetable_list.php?id=".$id_class);
?>

