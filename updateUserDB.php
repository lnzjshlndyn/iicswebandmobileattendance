<?php

include("db_connect.php");
session_start();

if (isset($_POST['update'])) {

	$id = $_POST['id'];
	$name = $_POST['name'];
	$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
	$email = $_POST['email'];
	$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
	$contactnumber = $_POST['contactnumber'];
	$contactnumber = htmlspecialchars($contactnumber, ENT_QUOTES, 'UTF-8');

    // checking empty fields
	if (empty($name) || empty($email) || empty($contactnumber)) {
		echo "<script type='text/javascript'>alert('Fill all fields.'); window.history.back();</script>";
	} else {
		$emailcheck = "SELECT * from login where email='$email'";

		$rEmail = mysqli_query($conn, $emailcheck) or die(mysqli_error());

		$checkrow = mysqli_num_rows($rEmail);
		$row = mysqli_fetch_assoc($rEmail);

		if($checkrow == 0){
			$update = "UPDATE login SET name='$name', email='$email', contactnumber='$contactnumber' where id='$id'";
			$rUpdate = mysqli_query($conn, $update);
			echo "<script type='text/javascript'>alert('Success 1.'); window.location.href='manageUser.php';</script>";
		}elseif ($checkrow == 1 && $row['email'] == $_SESSION['email']) {
			$update = "UPDATE login SET name='$name', email='".$_SESSION['email']."', contactnumber='$contactnumber' where id='$id'";
			$rUpdate = mysqli_query($conn, $update);
			echo "<script type='text/javascript'>alert('Success 2.'); window.location.href='manageUser.php'</script>";
		}elseif ($row['email'] == $email) {
			$update = "UPDATE login SET name='$name', email='$email', contactnumber='$contactnumber' where id='$id'";
			$rUpdate = mysqli_query($conn, $update);
			echo "<script type='text/javascript'>alert('Success 3.'); window.location.href='manageUser.php'</script>";
		}else{
			echo "<script type='text/javascript'>alert('ULOL.'); window.history.back();</script>";
		}







	}
}

?>