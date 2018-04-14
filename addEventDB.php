<?php

include("db_connect.php");
session_start();

if(isset($_POST['submit'])){

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$startTime = mysqli_real_escape_string($conn, $_POST['startTime']);
	$endTime = mysqli_real_escape_string($conn, $_POST['endTime']);
	$representative = mysqli_real_escape_string($conn, $_POST['representative']);
	$venue = mysqli_real_escape_string($conn, $_POST['venue']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);


	$validate = "SELECT * from event where (date='$date' and venue='$venue' and startTime < '$startTime' and endTime > '$startTime')
	or (date='$date' and venue='$venue' and startTime < '$endTime' and endTime > '$endTime')
	or (date='$date' and venue='$venue' and '$startTime' < startTime and '$endTime' > startTime) 
	or (date='$date' and venue='$venue' and startTime = '$startTime' and endTime = '$endTime') ";
	$rValidate = mysqli_query($conn, $validate);

	if(mysqli_num_rows($rValidate) == 0){
		$insert = "INSERT into event(name, date, startTime, endTime, representative, venue, description, status)
		values('$name', '$date', '$startTime', '$endTime',  '$representative', '$venue', '$description', '$status')";
		$rInsert = mysqli_query($conn, $insert) or die(mysqli_error());
		header('Location: eventsAdded.php');
	}else{
		echo "<script type='text/javascript'>alert('Slot is not available'); window.history.back();</script>";
	}


}



?>