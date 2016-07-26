<?php $page_title = 'Membership'; include ('includes/header.php'); 
 require ('connect.php');

 $sql="SELECT * FROM membership";
   $result = mysqli_query ($db, $sql);
   
echo  "<h1>Membership</h1>"; 
    
    if (mysqli_num_rows($result) !==0){
        echo'<table class="tablemember">
               <tr>
               <th>Membership</th>
               <th>Price</th>
               <th>Description</th>
               </tr>';
               
               while($row = mysqli_fetch_array($result)){
                   echo '<tr>
                   <td class="name">'.$row['name_membership'].'</td>
                   <td class="price">'.$row['price'].'€</td>
                   <td class="description">'.$row['description'].'</td>
                   </tr>';
               }
    
         echo '</table>';
    }     
             
             
include('includes/footer.php');
?>
    	
    
 