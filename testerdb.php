<?php

include("db_connect.php");
//$try = array();
/*
$try = $_POST['test'];


for($i=0; $i<count($try); $i++){
	$sql = "INSERT INTO test(num) values('$try[$i]')";
	mysqli_query($conn, $sql);
}

echo "<script>alert('HAHAHAHAHA'); window.history.back();</script>";
*/

date_default_timezone_set('Asia/Manila');

$curdate = time('');

$sql = "SELECT * from test";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
while($row = mysqli_fetch_assoc($result)){
	$date = $row['test'];
}

echo $date;
echo "<br/>";
echo date('g:iA', strtotime($date));


?>