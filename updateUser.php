 <?php

include("db_connect.php");
session_start();

$id = $_GET['id'];


$query = "SELECT * FROM login WHERE id='$id'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $name = $row['name'];
  $username = $row['username'];
  $email = $row['email'];
  $contactnumber = $row['contactnumber'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update User</title>
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
        <h1 class="adduser">Update User</h1>
        <table class="table table-bordered table-striped table-hover table-responsive">
          <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
          </tr>
          <form action="updateUserDB.php" method="post">
            <tr>
              <td><?php echo $username; ?></td>
              <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
              <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
              <td><input type="text" name="contactnumber" value="<?php echo $contactnumber; ?>"></td>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
            </tr>
          </table>
          <button type="button" class="CancelButton" onclick="history.back()">Cancel</button>
          <button type="submit" name="update" class="CancelButton">Update</button>
        </form>
      </center>
    </div>
  </div>
</body>
</html>
