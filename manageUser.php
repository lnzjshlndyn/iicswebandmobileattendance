<?php

include("db_connect.php");
session_start();

$select = "SELECT * from login";
$result = mysqli_query($conn, $select);

?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Users</title>
  <meta charset="ultf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <link rel="shortcut icon" href="images/favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style type="text/css">
  @media (max-width: 991px) {
    .inputstyle{
      background-color: #ffffff;
      color: #000000;
      cursor: pointer;
      margin: 0 auto;
      width: 60%;
      padding: 5px;
      display: inline-block;
      border: 1px solid;
      border-radius: 3px;
      font-size: 15px;
      font-family: 'Quicksand', sans-serif;
    }
  }

  @media (max-width: 450px){
    .inputstyle{
      background-color: #ffffff;
      color: #000000;
      cursor: pointer;
      margin: 0 auto;
      width: 50%;
      padding: 5px;
      display: inline-block;
      border: 1px solid;
      border-radius: 3px;
      font-size: 15px;
      font-family: 'Quicksand', sans-serif;
    }
  }
</style>

</head>
<body>
  <!-- NAV -->
  <div id="navbar" class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
      <p id="navbrand"><img src="images/iicslogomini.png" width="53" height="60"  alt="">&nbsp;IICS</p>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </div>

    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a  id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="attendance.php">Attendance</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="schedule.php">Schedules</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="documents.php">Documents</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="reports.php">Reports</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float hvr-text hvr-selected" href="manageUser.php">Manage User</a>
        </li>
        <li>
          <a href="logLogout.php" id="power" class="glyphicon glyphicon-off hvr-grow"></a>
        </li>
      </ul>
    </div>
  </div>
  <!--END NAV-->
  <div class="container">

    <br/><br/><br/><br/>
    <div class="row"> 
      <center>
        <br/>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
          <p class="documents">Manage User</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
         <button type="button" class="BackButton" onclick="window.location.href='addUser.php'">Add</button>
       </div>
       <table class="table table-bordered table-striped table-hover table-responsive">
        <tr>
          <th>Role</th>
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact Number</th>
          <th></th>
          <th></th>
        </tr>
        
        <?php while($row = mysqli_fetch_assoc($result)){

         echo "<tr>";
         echo "<td>". $row['role'] ."</td>";
         echo "<td> <a data-toggle='modal' data-target='#myModal' style='color: black;'> ". $row['username']."</a> </td>";
         echo "<td> <a data-toggle='modal' data-target='#myModal' style='color: black;'> ". $row['name'] ."</a> </td>";
         echo "<td>". $row['email'] ."</td>";
         echo "<td>". $row['contactnumber'] ."</td>";       
         echo "<td><input type='button' name='view' value='VIEW' id='".$row['id']."' class='btn btn-info btn-xs view_image'/></td>";
         echo "<td><a class='glyphicon glyphicon-trash' href='deleteUserDB.php?id=".$row["id"] . "' onClick=\"return confirm('Are you sure you want to delete the account ".$row['username']."?')\"></a></td>";
         echo "</tr>";

       } ?>

       <!-- Modal -->
       <div id="dataModal" class="modal fade">  
        <div class="modal-dialog">  
         <div class="modal-content">  
          <div class="modal-header">  
           <button type="button" class="close" data-dismiss="modal">&times;</button>  
           <h4 class="modal-title">Image</h4>  
         </div>  
         <div class="modal-body" id="image_detail">  
         </div>  
         <div class="modal-footer">  
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         </div>  
       </div>  
     </div>  
   </div> 
   <!-- End Modal -->
 </table>
</center>
</div>

</div>
</body>
</html>

<script>  
 $(document).ready(function(){  
  $('.view_image').click(function(){  
   var image_id = $(this).attr("id");  
   $.ajax({  
    url:"userModal.php",  
    method:"post",  
    data:{image_id:image_id},  
    success:function(data){  
     $('#image_detail').html(data);  
     $('#dataModal').modal("show");  
   }  
 });  
 });  
});  
</script>