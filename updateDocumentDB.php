<?php

include("db_connect.php");
session_start();

if (isset($_POST['update'])) {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');

	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$date = htmlspecialchars($date, ENT_QUOTES, 'UTF-8');

	$category = mysqli_real_escape_string($conn, $_POST['category']);
	$category = htmlspecialchars($category, ENT_QUOTES, 'UTF-8');

	$typeOfLeave = mysqli_real_escape_string($conn, $_POST['typeOfLeave']);
	$typeOfLeave = htmlspecialchars($typeOfLeave, ENT_QUOTES, 'UTF-8');

	$professor = mysqli_real_escape_string($conn, $_POST['professor']);
	$professor = htmlspecialchars($professor, ENT_QUOTES, 'UTF-8');

	$faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
	$faculty = htmlspecialchars($faculty, ENT_QUOTES, 'UTF-8');

	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$status = htmlspecialchars($status, ENT_QUOTES, 'UTF-8');

	$update = "UPDATE documents SET date='$date', category='$category', typeOfLeave='$typeOfLeave', professor='$professor', faculty='$faculty', status='$status' where id='$id'";
	$rUpdate = mysqli_query($conn, $update);
	echo "<script type='text/javascript'>alert('Update Successful.'); window.location.href='documents.php';</script>";
}


?>