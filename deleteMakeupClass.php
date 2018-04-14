<?php

include("db_connect.php");

$id = $_GET['id'];

$sql = "DELETE FROM makeupclass WHERE id=$id";
mysqli_query($conn, $sql) or die(mysqli_error());

echo "<script>alert('Makeup class deleted.'); window.location.href='makeupClass.php';</script>";

?>