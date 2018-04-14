<?php

session_start();
include("db_connect.php");

$sessid = $_SESSION['sessid'];

if(isset($_POST['update'])){

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$startTime = mysqli_real_escape_string($conn, $_POST['startTime']);
	$endTime = mysqli_real_escape_string($conn, $_POST['endTime']);
	$section = mysqli_real_escape_string($conn, $_POST['section']);
	$room = mysqli_real_escape_string($conn, $_POST['room']);
	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$professor = mysqli_real_escape_string($conn, $_POST['professor']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);

	$converted = date('l', strtotime($date));
	
	$validate1 = "SELECT * from room_mastertable where (subject is null and day='$converted' and room='$room' and startTime < '$startTime' and endTime > '$startTime')
	or (subject is null and day='$converted' and room='$room' and startTime < '$endTime' and endTime > '$endTime')
	or (subject is null and day='$converted' and room='$room' and '$startTime' < startTime and '$endTime' > startTime) 
	or (subject is null and day='$converted' and room='$room' and startTime = '$startTime' and endTime = '$endTime') ";
	$rValidate1 = mysqli_query($conn, $validate1);

	if(mysqli_num_rows($rValidate1) > 0){		

		$validate = "SELECT * from makeupclass where (date='$date' and room='$room' and startTime < '$startTime' and endTime > '$startTime')
		or (date='$date' and room='$room' and startTime < '$endTime' and endTime > '$endTime')
		or (date='$date' and room='$room' and '$startTime' < startTime and '$endTime' > startTime) 
		or (date='$date' and room='$room' and startTime = '$startTime' and endTime = '$endTime') ";

		$same = "SELECT id from makeupclass where id=$sessid and date='$date' and startTime='$startTime' and endTime='$endTime'";
		$rSame = mysqli_query($conn, $same);

		$rValidate = mysqli_query($conn, $validate);

		if(mysqli_num_rows($rValidate) == 0 || mysqli_num_rows($rValidate) > 0 && mysqli_num_rows($rSame) == 1){

			$update = "UPDATE makeupclass SET date='$date', startTime='$startTime', endTime='$endTime', section='$section', room='$room',
			subject='$subject', professor='$professor', status='$status' WHERE id=$id";
			$rUpdate = mysqli_query($conn, $update);

			echo "<script>alert('Makeup class updated.'); window.location.href='makeupClass.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('Slot is not available. There is a make up class scheduled.'); window.history.back();</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('Slot is not available. There is a class scheduled.'); window.history.back();</script>";
	}
}


?>
