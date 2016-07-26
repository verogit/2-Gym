<?php
    session_start();
    require ('../connect.php');

    $sql2= "UPDATE user SET first_name = '" . $_POST["first_name"]."', last_name = '" . $_POST["last_name"]."', phone_number = '".$_POST['phone']."', email = '".$_POST['email']."' WHERE username= '".$_SESSION['login_user']."'";
    $_SESSION['message']="Your profile had been update";
    $res= mysqli_query($db,$sql2);
    header("location: 4.profile.php");
    
        mysqli_close($db); // Close the database connection.
?>