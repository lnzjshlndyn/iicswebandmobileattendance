<?php

include("db_connect.php");
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Document</title>
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
    .navbar-header {
      float: none;
    }
    .navbar-left,.navbar-right {
      float: none !important;
    }
    .navbar-toggle {
      display: block;
    }
    .navbar-collapse {
      border-top: 1px solid transparent;
      box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }
    .navbar-fixed-top {
      top: 0;
      border-width: 0 0 1px;
    }
    .navbar-collapse.collapse {
      display: none!important;
    }
    .navbar-nav {
      float: none!important;
      margin-top: 7.5px;
    }
    .navbar-nav>li {
      float: none;
    }
    .navbar-nav>li>a {
      padding-top: 10px;
      padding-bottom: 10px;
    }
    .collapse.in{
      display:block !important;
    }

  }
  @media (max-width: 450px){
    .datestyle{
      background-color: #ffffff;
      color: #000000;
      cursor: pointer;
      margin: 0 auto;
      width: 70%;
      padding: 5px;
      display: inline-block;
      border: 1px solid;
      border-radius: 3px;
      font-size: 15px;
      font-family: 'Quicksand', sans-serif;
    }

  }
</style>
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
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float hvr-text hvr-selected" href="documents.php">Documents</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="reports.php">Reports</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="addUser.php">Add User</a>
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
    <center>
      <h1 class="adduser">Upload Document</h1>
      <form action="addDocumentDB.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <p>Date: <input type="date" name="date" id="date" class="datestyle" required></p>
          </div>

          <div class="col-md-12 col-xs-12">
            <p>Category: <select name="category" id="category" class="datestyle" required>
              <option value ="Excuse Letter">Excuse Letter</option>
              <option value ="Medical Letter">Medical Letter</option>
            </select> </p>
          </div>
          <div class="col-md-12 col-xs-12">
            <p>Type of Leave: <select name="typeOfLeave" id="time" class="datestyle" required>
              <option value ="Leave of Absence">Leave of Absence</option>
              <option  value="Maternity Leave">Maternity Leave</option>
              <option value="Notification for Substitution">Notification for Substitution</option>
              <option value="Sabbatical Leave">Sabbatical Leave</option>
              <option value ="Sick Leave">Sick Leave</option>
              <option value="Study Leave">Study Leave</option>
            </select> </p>
          </div>
          <div class="col-md-12 col-xs-12">
            <p>Professor: <select name="professor" id="time" class="datestyle" required>
              <?php

              $select = "SELECT DISTINCT fullname FROM room_mastertable WHERE fullname!='' ORDER BY fullname";
              $rSelect = mysqli_query($conn, $select) or die(mysqli_error());

              while($row = mysqli_fetch_assoc($rSelect)){
               echo "<option value='".$row['fullname']."'>".$row['fullname']."</option>";
             }

             ?>
           </select> </p>
         </div>
         <div class="col-md-12 col-xs-12">
          <p>Faculty: <select name="faculty" id="time" class="datestyle" required>
            <option value ="IT">IT</option>
            <option value ="IS">IS</option>
            <option value ="CS">CS</option>
          </select> </p>
        </div>
        <div class="col-md-12 col-xs-12">
          <p>Status: <select name="status" id="time" class="datestyle" required>
            <option value ="Pending">Pending</option>
            <option value ="Approved">Approved</option>
          </select> </p>
        </div>
        <div>
          <p> File: <input type="file" name="image" accept="image/*" id="fileName" onchange="ValidateFileUpload()" required> </p>
        </div>
        <br/>
      </div>
      <button type="button" class="CancelButton" onclick="history.back()">Cancel</button>
      <button type="submit" name="submit" class="CancelButton">Upload</button>
    </form>
  </div>
</body>
</html>

<script type="text/javascript">
  function ValidateFileUpload() {
    var fuData = document.getElementById('fileName');
    var FileUploadPath = fuData.value;

//To check if user upload any file
if (FileUploadPath == '') {
  alert("Please upload an image");

} else {
  var Extension = FileUploadPath.substring(
    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp"
  || Extension == "jpeg" || Extension == "jpg") {

// To Display
if (fuData.files && fuData.files[0]) {
  var reader = new FileReader();

  reader.onload = function(e) {
    $('#blah').attr('src', e.target.result);
  }

  reader.readAsDataURL(fuData.files[0]);
}

} 

//The file upload is NOT an image
else {
  alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
  fuData.value="";

}
}
}
</script>