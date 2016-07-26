	   <?php
        session_start();
        require ('connect.php');
        
        if (isset($_POST['submit'])) {
            if (empty($_POST['username']) || empty($_POST['password'])) {
                $error = "Username or Password is invalid";
            }
             else {
                $username=$_POST['username'];
                $password=$_POST['password'];
            
                $sql= "SELECT * FROM user WHERE username= '$username' AND password= '$password'";
                $res= mysqli_query($db,$sql);
                
                if (mysqli_num_rows($res) == 1){
                	if (($username == "admin") && ($password == "password")){
                		 $_SESSION['login_user']=$username;
                		 header("Location: adm_pages/1.home_adm.php");
                	}else{
                		$_SESSION['login_user']=$username;
                    	header("Location:register_pages/1.home_member.php");	
                	}
                }
                else {

                    $error = "Username or Password is invalid";
                    $_SESSION['error_login']=$error;
                    header("Location: login.php");
                }
            }
        }
        $page_title = 'Login';
    	include ("includes/header.php");//include the same header for all the page
		session_start();

    	if(isset($_SESSION['error_login'])){
    		echo "<span>".$_SESSION['error_login']."</span>";// IF EXIST A ERROR IN THE LOGIN PRINT A ERROR
    	}
        mysqli_close($db); // Close the database connection.
	?>
	<h1>Login</h1>
	<form action="" method="POST">	
    	<table class="form">
	        <tr>
	            <td>User Name:</td>
	            <td><input type="text" name="username" required/></td>
	        </tr>
	        <tr>
	            <td>Password:</td>
	            <td><input type="password" name="password" required/></td>
	        </tr>
	    </table>
		<input class="login" type="submit" name="submit" value="LOGIN"/>
	</form>
<p class="marginLogin"></p>
<?php include('includes/footer.php'); ?>
