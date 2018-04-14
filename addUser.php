<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
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
    <center>
      <h1 class="adduser">Add User</h1>
      <form action="addUserDB.php" method="post" enctype="multipart/form-data">
        <p>Role:
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="role" class="inputstyle" required>
            <option value="admin">Administrator</option>
            <option value="staff">Staff</option>
          </select></p>
          <p>Username:
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="username" placeholder="Username" class="inputstyle" required/></p>
            <p>Password:
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              <input type="password" name="password" placeholder="Password" class="inputstyle" required/></p>
              <p>Re-type Password: 
                &nbsp;&nbsp;&nbsp;
                <input type="password" name="repassword" placeholder="Re-type Password" class="inputstyle" required/></p>
                <p>Full Name:
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="name" placeholder="Full Name" class="inputstyle" required/></p>
                  <p>Email Address:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="email" name="email" placeholder="Email Address" class="inputstyle" required/></p>
                    <p>Contact Number:
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" name="contactnumber" placeholder="Contact Number" class="inputstyle" required/></p>
                      <br/>
                      <p> File: <input type="file" name="myFile" accept="image/*" id="image" onchange="ValidateFileUpload()" required> </p>
                      <button type="button" class="CancelButton" onclick="history.back()">Cancel</button>
                      <button type="submit" name="submit" class="CancelButton">Add</button>
                    </form>
                    <br/><br/>
                  </center>
                </div>
              </body>
              </html>
              <script type="text/javascript">
                function ValidateFileUpload() {
                  var fuData = document.getElementById('image');
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