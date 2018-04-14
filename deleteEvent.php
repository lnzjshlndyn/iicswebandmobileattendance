<?php

include("db_connect.php");

$id = $_GET['id'];

$sql = "DELETE FROM event WHERE id=$id";
mysqli_query($conn, $sql) or die(mysqli_error());

echo "<script>alert('Event deleted.'); window.location.href='events.php';</script>";

?>