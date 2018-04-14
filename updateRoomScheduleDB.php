<?php

include("db_connect.php");
session_start();

if (isset($_POST['update'])) {

	$id = $_POST['id'];
	//$startTime = $_POST['startTime'];
	//$endTime = $_POST['endTime'];
	$section = $_POST['section'];
	$subject = $_POST['subject'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];

	if(empty($subject) || empty($section) || empty($firstname) || empty($lastname)){
		echo "<script type='text/javascript'>alert('Fill all fields.'); window.history.back();</script>";
	}else{
		$update = "UPDATE room_mastertable set subject ='$subject', section='$section', 
									firstname='$firstname', lastname='$lastname', fullname='$firstname $lastname' where id='$id'";
		$rUpdate = mysqli_query($conn, $update) or die(mysqli_error());

		echo "<script type='text/javascript'>alert('Update successful.'); window.location.href='roomschedule.php';</script>";
	}


}



?>