<?php

session_start();
include("db_connect.php");

$id = $_GET['id'];

$sql = "SELECT DISTINCT fullname FROM room_mastertable WHERE fullname!='' ORDER BY fullname";
$result = mysqli_query($conn, $sql) or die(mysqli_error());

$sql1 = "SELECT name FROM event WHERE id=$id";
$result1 = mysqli_query($conn, $sql1) or die(mysqli_error());

while($row = mysqli_fetch_assoc($result1))
  $name = $row['name'];
?>



<!DOCTYPE html>
<html>
<head>
  <title>Add Attendees</title>
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
    .funkyradio label {
      width: 100%;
      border-radius: 3px;
      border: 1px solid #D1D3D4;
      font-weight: normal;
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
    .funkyradio label {
      width: 100%;
      border-radius: 3px;
      border: 1px solid #D1D3D4;
      font-weight: normal;
    }

  }

  .funkyradio div {
    clear: both;
    overflow: hidden;
  }

  .funkyradio label {
    width: 50%;
    border-radius: 3px;
    border: 1px solid #D1D3D4;
    font-weight: normal;
  }

  .funkyradio input[type="checkbox"]:empty {
    display: none;
  }

  .funkyradio input[type="checkbox"]:empty ~ label {
    position: relative;
    line-height: 2em;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  .funkyradio input[type="checkbox"]:empty ~ label:before {
    position: absolute;
    display: block;
    top: 0;
    bottom: 0;
    left: 0;
    content: '';
    width: 2.5em;
    background: #D1D3D4;
    border-radius: 3px 0 0 3px;
  }

  .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
    color: #888;
  }

  .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
    content: '\2714';
    color: #C2C2C2;
  }

  .funkyradio input[type="checkbox"]:checked ~ label {
    color: #000000;
  }

  .funkyradio input[type="checkbox"]:checked ~ label:before {
    content: '\2714';
    color: #333;
    background-color: #ccc;
  }

  .funkyradio input[type="checkbox"]:focus ~ label:before {
    box-shadow: 0 0 0 3px #999;
  }

  .funkyradio-info input[type="checkbox"]:checked ~ label:before {
    color: #fff;
    background-color: #5bc0de;
  }

  .funkyradio {
    font-family: 'Quicksand', sans-serif;
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
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float hvr-text hvr-selected" href="schedule.php">Schedules</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="documents.php">Documents</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="reports.php">Reports</a>
        </li>
        <li>
          <a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="manageUser.php">Add User</a>
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
      <h1 class="selecattendees">Events</h1>
      <form action="addAttendeesDB.php" method="post">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <p class="attendees">Select Attendees:</p>
          </div>

        </div>

        <?php  

        $count = 0;

        while($row = mysqli_fetch_assoc($result)){

          echo "
          <div class='funkyradio'>
          <div class='funkyradio-info'>
          <input type='checkbox' name='attendees[]' id='checkbox".$count."' value='".$row['fullname']."' />
          <label for='checkbox".$count."'>".$row['fullname']."</label>
          </div>
          </div>";

          $count++;
        }

        ?>



        <br/>
        <input type="hidden" name="name" value="<?php echo $name ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <button type="button" class="CancelButton" onclick="history.back()">Cancel</button>
        <button type="submit" name="submit" class="CancelButton">Add</button>
      </form>
    </div>
  </body>
  </html>
