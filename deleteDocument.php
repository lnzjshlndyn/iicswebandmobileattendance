<?php

session_start();
include("db_connect.php");

$id = $_GET['id'];

$sql = "SELECT filepath FROM documents WHERE id=$id";
$result = mysqli_query($conn, $sql) or die(mysqli_error());

while($row = mysqli_fetch_assoc($result)){

	$filepath = $row['filepath'];
}

$sql1 = "DELETE FROM documents WHERE id=$id";
mysqli_query($conn, $sql1) or die(mysqli_error());

unlink($filepath);

echo "<script>alert('Document deleted.'); window.history.back();</script>";


?>