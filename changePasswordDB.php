<?php

require 'log.php';

include("db_connect.php");
session_start();

if(isset($_POST['submit'])){
	$newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
	$newpassword = htmlspecialchars($newpassword, ENT_QUOTES, 'UTF-8');
	$foopassword = mysqli_real_escape_string($conn, $_POST['foopassword']);
	$foopassword = htmlspecialchars($foopassword, ENT_QUOTES, 'UTF-8');

	if($newpassword == $foopassword){
		$change = "UPDATE login set password=md5('$newpassword') where username='".$_SESSION['username']."'";
		$rChange = mysqli_query($conn, $change);
		$delete = "UPDATE login set code=NULL where username='".$_SESSION['username']."'";
		$rDelete = mysqli_query($conn, $delete);
		$log->lwrite('Password updated by: '.$_SESSION['username']);
		header('Location: passwordChanged.php');
	}else{
		echo "<script type='text/javascript'>alert('Passwords do not match.'); window.history.back();</script>";
	}
}


?>