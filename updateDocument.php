<?php

include("db_connect.php");
session_start();

$id = $_GET['id'];

$select = "SELECT * from documents where id='$id'";
$rSelect = mysqli_query($conn, $select) or die(mysqli_error());


while($row = mysqli_fetch_assoc($rSelect)){
	$date = $row['date'];
	$imagename = $row['imagename'];
	$category = $row['category'];
	$typeOfLeave = $row['typeOfLeave'];
	$professor = $row['professor'];
	$faculty = $row['faculty'];
	$status = $row['status'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Document</title>
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
					<a id="navlink" class="nav-link hvr-underline-reveal hvr-float" href="schedule.php">Schedules</a>
				</li>
				<li>
					<a id="navlink" class="nav-link hvr-underline-reveal hvr-float hvr-text hvr-selected" href="documents.php">Documents</a>
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
	<div class="container">
		<br/><br/><br/><br/><br/>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<p class="documents">Documents</p>
			</div>
		</div>
		<center>
			<table class="table table-bordered table-striped table-hover table-responsive">
				<tr>
					<th>Date</th>
					<th>Filename</th>
					<th>Category</th>
					<th>Type of Leave</th>
					<th>Professor</th>
					<th>Faculty</th>
					<th>Status</th>
				</tr>
				<form action="updateDocumentDB.php" method="post">
					<tr>
						<td><input type="date" name="date" value="<?php echo $date?>"></td>
						<td><?php echo $imagename ?></td>
						<td><select name="category" required>	
							<?php
							switch ($category) {
								case 'Excuse Letter':
								echo "			
								<option value='".$category."'>".$category."</option>
								<option value='Medical Letter'>Medical Letter</option>";
								break;

								default:
								echo "			
								<option value='".$category."'>".$category."</option>
								<option value='Excuse Letter'>Excuse Letter</option>";
								break;
							}
							?>

						</select></td>
						<td><select name="typeOfLeave">
							<?php
							switch ($typeOfLeave) {
								case 'Leave of Absence':
								echo "			
								<option value='".$typeOfLeave."'>".$typeOfLeave."</option>
								<option value='Sick Leave'>Sick Leave</option>";
								break;

								default:
								echo "			
								<option value='".$typeOfLeave."'>".$typeOfLeave."</option>
								<option value='Leave of Absence'>Leave of Absence</option>";
								break;
							}
							?>
						</select>	</td>
						<td><select name="professor">
							<option value="<?php echo $professor ?>"><?php echo $professor ?></option>
							<?php

							$select = "SELECT DISTINCT fullname FROM room_mastertable WHERE fullname!='' ORDER BY fullname";
							$rSelect = mysqli_query($conn, $select) or die(mysqli_error());

							while($row = mysqli_fetch_assoc($rSelect)){
								echo "<option value='".$row['fullname']."'>".$row['fullname']."</option>";
							}

							?>
						</select></td>
						<td><select name="faculty">
							<?php
							switch ($faculty) {
								case 'IT':
								echo "			
								<option value='".$faculty."'>".$faculty."</option>
								<option value='IS'>IS</option>
								<option value='CS'>CS</option>";
								break;

								case 'IS':
								echo "			
								<option value='".$faculty."'>".$faculty."</option>
								<option value='IT'>IT</option>
								<option value='CS'>CS</option>";
								break;

								default:
								echo "			
								<option value='".$faculty."'>".$faculty."</option>
								<option value='IT'>IT</option>
								<option value='IS'>IS</option>";
								break;
							}
							?>
						</select></td>
						<td><select name="status" id="time" required>
							<?php
							switch ($status) {
								case 'Pending':
								echo "			
								<option value='".$status."'>".$status."</option>
								<option value='Approved'>Approved</option>
								<option value='Dispproved'>Dispproved</option>";
								break;

								case 'Approved':
								echo "			
								<option value='".$status."'>".$status."</option>
								<option value='Pending'>Pending</option>
								<option value='Dispproved'>Dispproved</option>";
								break;

								default:
								echo "			
								<option value='".$status."'>".$status."</option>
								<option value='Pending'>Pending</option>
								<option value='Approved'>Approved</option>";
								break;
							}
							?>
						</select></td>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					</tr>
				</table>
				<button type="button" class="CancelButton" onclick="history.back()">Cancel</button>
				<button type="submit" name="update" class="CancelButton">Update</button>
			</form>
		</center>
	</div>
</body>
</html>
