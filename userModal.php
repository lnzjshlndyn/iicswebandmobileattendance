<?php  
include("db_connect.php");

 if(isset($_POST["image_id"])) {  
      $output = '';  
      $query = "SELECT * FROM login WHERE id = '".$_POST["image_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= "  
                <tr>   
                     <td>".$row["imagename"]."</td>  
                </tr>  
                <tr>  
                     <td><img src='".$row["filepath"]."' class='photoDesign'> </td>  
                </tr> 
                ";  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>