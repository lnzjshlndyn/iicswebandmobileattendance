<?php

include("db_connect.php");
session_start();

if(isset($_POST['submit'])){

	$date = $_POST['date'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$section = mysqli_real_escape_string($conn, strtoupper($_POST['section']));
	$professor = mysqli_real_escape_string($conn, $_POST['professor']);
	$room = mysqli_real_escape_string($conn, strtoupper($_POST['room']));
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
		$rValidate = mysqli_query($conn, $validate);

		if(mysqli_num_rows($rValidate) == 0){

			$insert = "INSERT into makeupclass(date, startTime, endTime, subject, section, professor, room, status) 
			values ('$date','$startTime','$endTime', '$subject','$section','$professor','$room', '$status')";
			$rInsert = mysqli_query($conn, $insert);

			header('Location: makeUpClassAdded.php');
		}else{
			echo "<script type='text/javascript'>alert('Slot is not available. There is a make up class scheduled.'); window.history.back();</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('Slot is not available. There is a class scheduled.'); window.history.back();</script>";
	}
}


?>
