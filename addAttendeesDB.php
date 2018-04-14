<?php

session_start();
include("db_connect.php");

if(isset($_POST['submit'])){

	$id = $_POST['id'];
	$name = $_POST['name'];
	$attendees = $_POST['attendees'];

	for($i=0; $i<count($attendees); $i++){
		$sql = "INSERT INTO eventattendance(eventid, eventname, attendees, status) VALUES('$id', '$name', '$attendees[$i]', NULL)";
		mysqli_query($conn, $sql) or die(mysqli_error());
	}

	echo "<script>alert('Attendees added successfully.'); window.location.href='viewAttendees.php?id=$id';</script>";

}
?>