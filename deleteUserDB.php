<?php

include("db_connect.php");
session_start();

$id = $_GET['id'];

$sql = "SELECT filepath FROM login WHERE id=$id";
$result = mysqli_query($conn, $sql) or die(mysqli_error());

while($row = mysqli_fetch_assoc($result)){
	$filepath = $row['filepath'];
}

if ($_SESSION['id'] == $id) {
	echo "<script type='text/javascript'>alert('Deleting own account is prohibited.'); window.history.back();</script>";
}else{

	$query = "DELETE FROM login WHERE id=$id";
	$result = mysqli_query($conn, $query);
	unlink($filepath);
	echo "<script>alert('Account deleted.'); window.history.back();</script>";
}



?>