<?php

include("db_connect.php");
session_start();

$id = $_GET['id'];

$_SESSION['sessid'] = $id;

$select = "SELECT * from makeupclass where id='$id'";
$rSelect = mysqli_query($conn, $select) or die(mysqli_error());

while($row = mysqli_fetch_assoc($rSelect)){
  $date = $row['date'];
  $startTime = $row['startTime'];
  $endTime = $row['endTime'];
  $section = $row['section'];
  $subject = $row['subject'];
  $room = $row['room'];
  $professor = $row['professor'];
  $status = $row['status'];
}

$sql = "SELECT DISTINCT section FROM room_mastertable WHERE section!='' ORDER BY section";
$rSql = mysqli_query($conn, $sql) or die(mysqli_error());

$sql1 = "SELECT DISTINCT room FROM room_mastertable WHERE room!='' ORDER BY room";
$rSql1 = mysqli_query($conn, $sql1) or die(mysqli_error());

$sql2 = "SELECT DISTINCT fullname FROM room_mastertable WHERE fullname!='' ORDER BY fullname";
$rSql2 = mysqli_query($conn, $sql2) or die(mysqli_error());
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Makeup Class</title>
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
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float hvr-text hvr-selected" href="schedule.php">Schedules</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="documents.php">Documents</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="reports.php">Reports</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="manageUser.php">Manage User</a>
        </li>
        <li>
          <a href="logLogout.php" id="power" class="glyphicon glyphicon-off hvr-grow"></a>
        </li>
      </ul>
    </div>
  </div>
  <!--END NAV-->
  <br/><br/><br/><br/>  
  <div class="container">
    <div class="row">
      <div class="tableDesign">
        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-8">
          <p class="documents"> Makeup Class</p>
        </div>

      </div>

      <center>
        <table class='table table-bordered table-striped table-hover table-responsive'>
          <tr>
            <th>DATE</th>
            <th>TIME</th>
            <th>SECTION</th>
            <th>ROOM</th>
            <th>SUBJECT</th>
            <th>PROFESSOR</th>
            <th>STATUS</th>
          </tr>
          <form action="updateMakeUpClassDB.php" method="post">
            <tr>
              <td><input type="date" name="date" value="<?php echo $date ?>"></td>
              <td><input type="time" name="startTime" value="<?php echo $startTime ?>"> - <input type="time" name="endTime" value="<?php echo $endTime ?>"></td>
              <td><select name="section">
                <option value="<?php echo $section ?>"><?php echo $section ?></option>
                <?php
                while($row = mysqli_fetch_assoc($rSql)){
                  echo "<option value='".$row['section']."'>".$row['section']."</option>";
                }
                ?>
              </select></td>
              <td><select name="room">
                <option value="<?php echo $room ?>"><?php echo $room ?></option>
                <?php
                while($row = mysqli_fetch_assoc($rSql1)){
                  echo "<option value='".$row['room']."'>".$row['room']."</option>";
                }
                ?>
              </select></td>
              <td><input type="text" name="subject" value="<?php echo $subject ?>"></td>
              <td><select name="professor">
                <option value="<?php echo $professor ?>"><?php echo $professor ?></option>
                <?php
                while($row = mysqli_fetch_assoc($rSql2)){
                  echo "<option value='".$row['fullname']."'>".$row['fullname']."</option>";
                }
                ?>
              </select></td>
              <td><select name="status">
                <option value="<?php echo $status ?>"><?php echo $status ?></option>
                <?php
                switch ($status) {
                  case 'Pending':
                  echo "<option value='Approved'>Approved</option>
                  <option value='Disapproved'>Disapproved</option>";
                  break;

                  case 'Approved':
                  echo "<option value='Pending'>Pending</option>
                  <option value='Disapproved'>Disapproved</option>";
                  break;

                  default:
                  echo "<option value='Pending'>Pending</option>
                  <option value='Approved'>Approved</option>";
                  break;
                }
                ?>
              </select></td>
              <input type="hidden" name="id" value="<?php echo $id ?>">
            </tr>
          </table>
          <button type="button" class="CancelButton" onclick="window.location.href='makeUpClass.php'">Cancel</button>
          <button type="submit" name="update" class="CancelButton">Update</button>
        </form>
      </center>
    </div>
  </div>
</div>
</body>
</html>
