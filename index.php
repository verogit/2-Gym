<?php 
    $page_title = 'Home';
    include ('includes/header.php');
?>
<p class="indextexts">Welcome to Super Fitness Gym. We provide everything you are looking for from swimming to gym for all ages of the 
community and every level of fitness. Whether you are looking to tone up, lose weight,
learn to swim or simply have a fun and healthy day out with your family - we have what you are looking for!</p>

<img id="home_1_image" src="images/926197_651346114919717_1533551050_n.jpg" alt="photo-1434682881908-b43d0467b798.jpgs" height="400" width="250">

<?php 
    require ('connect.php');

    $sql = "SELECT feature1, feature2 FROM page WHERE page_name='HOME'";
    $result = mysqli_query ($db, $sql);
    
    $row = mysqli_fetch_array($result);
    echo "<div class='feature1'>";
    echo "<p class='class='feature1'>".$row['feature1']."</p>";
    echo "</div>";
    echo "<div class='feature2'>";
    echo "<p class='feature2'>".$row['feature2']."</p>";
    echo "</div>";
    include ('includes/footer.php'); 
?>