<?php

$conn = mysqli_connect("localhost", "root", "", "webandmobileattendance");

if(mysqli_connect_errno()){

	echo mysqli_connect_error();
}
/*
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
$conn = new mysqli($server, $username, $password, $db);
*/
?>