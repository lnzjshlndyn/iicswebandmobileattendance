<?php

include("db_connect.php");
session_start();

$sessid = $_SESSION['sessid'];

if(isset($_POST['update'])){
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$startTime = mysqli_real_escape_string($conn, $_POST['startTime']);
	$endTime = mysqli_real_escape_string($conn, $_POST['endTime']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$representative = mysqli_real_escape_string($conn, $_POST['representative']);
	$venue = mysqli_real_escape_string($conn, $_POST['venue']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);


	$validate = "SELECT * FROM event where (date='$date' and venue='$venue' and startTime < '$startTime' and endTime > '$startTime')
	or (date='$date' and venue='$venue' and startTime < '$endTime' and endTime > '$endTime')
	or (date='$date' and venue='$venue' and '$startTime' < startTime and '$endTime' > startTime) 
	or (date='$date' and venue='$venue' and startTime = '$startTime' and endTime = '$endTime') ";
	$rValidate = mysqli_query($conn, $validate);

		$same = "SELECT id from event where id=$sessid and date='$date' and startTime='$startTime' and endTime='$endTime'";
		$rSame = mysqli_query($conn, $same);

	if(mysqli_num_rows($rValidate) == 0 || mysqli_num_rows($rValidate) > 0 && mysqli_num_rows($rSame) == 1){
		$update = "UPDATE event SET name='$name', date='$date', startTime='$startTime', endTime='$endTime',
		representative='$representative', venue='$venue', description='$description', status='$status' WHERE id=$id";
		$rUpdate = mysqli_query($conn, $update) or die(mysqli_error());
		echo "<script>alert('Event updated.'); window.location.href='events.php';</script>";
	}else{
		echo "<script type='text/javascript'>alert('Slot is not available'); window.history.back();</script>";
	}


}



?>