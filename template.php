<?php # Script 3.4 - index.php

    include 'includes/dataFromPagesTable.php';
    include 'includes/header.php';

    echo '<div id="feature1template">';
        echo '<p class="text_template_1">'.$feature1.'</p>';
        echo '<img id="image_template_1" src="images/'.$picture1.'" alt="'.$picture1.'" height="200" width="250">';
    echo '</div>';
    
    echo '<div id="feature2template">';
        echo '<p class="text_template_2">'.$feature2.'</p>';
        echo '<img id="image_template_2" src="images/'.$picture2.'" alt="'.$picture2.'" height="200" width="250">';
    echo '</div>';
    
    include 'includes/footer.php';
?>
