<?php
//receive value from
    $pageID = $_GET['pageID'];
    //echo 'passed value '.$pageID;
    //connect to the database
    require ('connect.php');
    //get the page you want from the database
    $q = "SELECT page_name, info1, info2, name_img1, name_img2 FROM page WHERE id_page =". $pageID;
    $r = mysqli_query ($db, $q);
    
    if (mysqli_num_rows($r) == 1) {
    
        // Get the information from the table information:
        $row = mysqli_fetch_array ($r);
        $pageName = $row[0];
        $feature1 = $row[1];
        $feature2 = $row[2];
        $picture1 = $row[3];
        $picture2 = $row[4];
        $page_title = $pageName;
    }
?>