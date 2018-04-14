<?php

include("db_connect.php");
session_start();

if(isset($_POST['submit'])){
	if (($_FILES['myFile']['name']!="")){
		$directory = "user/";//create a subfolder named "user" inside your thesis folder
		$file = $_FILES['myFile']['name'];
		$path = pathinfo($file);//getting the attributes of the file
		$filename = $path['filename'];// a parameter for pathinfo() function
		$ext = $path['extension'];// a parameter for pathinfo() function
		$temp_name = $_FILES['myFile']['tmp_name'];
		$path_filename_ext = $directory.$filename.".".$ext;

		$role = mysqli_real_escape_string($conn, $_POST['role']);
		$role = htmlspecialchars($role, ENT_QUOTES, 'UTF-8');
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$repassword = mysqli_real_escape_string($conn, $_POST['repassword']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$name = htmlentities($name, ENT_QUOTES, 'UTF-8');
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$email = htmlentities($email, ENT_QUOTES, 'UTF-8');
		$contactnumber = mysqli_real_escape_string($conn, $_POST['contactnumber']);
		$contactnumber = htmlentities($contactnumber, ENT_QUOTES, 'UTF-8');

		$userCheck = "SELECT * from login where username = '$username'";
		$emailCheck = "SELECT * from login where email = '$email'";
		$rUserCheck= mysqli_query($conn, $userCheck);
		$rEmailCheck = mysqli_query($conn, $emailCheck);

		if (file_exists($path_filename_ext)) {
			echo "<script type='text/javascript'>alert('Filename already exists.'); window.history.back();</script>";
		}else{
			if(mysqli_num_rows($rUserCheck) != 0){
				echo "<script type='text/javascript'>alert('Username already exists.'); window.history.back();</script>"; 
			}elseif (mysqli_num_rows($rEmailCheck) != 0) {
				echo "<script type='text/javascript'>alert('Email already exists.'); window.history.back();</script>";
			} else{
				if(!empty($role) && !empty($username) && !empty($password) && !empty($repassword) && !empty($name) && !empty($email) && !empty($contactnumber)){
					if($password == $repassword){
						$insertquery = "INSERT into login(role, username, password, name, email, contactnumber, imagename, filepath) 
						values ('$role', '$username', md5('$password'), '$name', '$email', '$contactnumber', '$file', '$path_filename_ext')";
						mysqli_query($conn, $insertquery) or die(mysqli_error());
						move_uploaded_file($temp_name,$path_filename_ext);
						header('Location: newUser.php');
					} else {
						echo "<script type='text/javascript'>alert('Passwords do not match.'); window.history.back();</script>";
					}
				} else{
					echo "<script type='text/javascript'>alert('Fill all fields.'); window.history.back();</script>";
				}
			}
		}
	}
}
?>