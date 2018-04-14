<?php

include("db_connect.php");
session_start();
//ini_set('upload_max_filesize', 20);

if(isset($_POST['submit'])){
	if (($_FILES['image']['name']!="")){
		$directory = "upload/";//create a subfolder named "upload" inside your thesis folder
		$file = $_FILES['image']['name'];
		$path = pathinfo($file);//getting the attributes of the file
		$filename = $path['filename'];// a parameter for pathinfo() function
		$ext = $path['extension'];// a parameter for pathinfo() function
		$temp_name = $_FILES['image']['tmp_name'];
		$path_filename_ext = $directory.$filename.".".$ext;

		$date = $_POST['date'];
		$category = $_POST['category'];
		$category = htmlspecialchars($category, ENT_QUOTES, 'UTF-8');
		$typeOfLeave = $_POST['typeOfLeave'];
		$typeOfLeave = htmlspecialchars($typeOfLeave, ENT_QUOTES, 'UTF-8');
		$professor = $_POST['professor'];
		$professor = htmlspecialchars($professor, ENT_QUOTES, 'UTF-8');
		$faculty = $_POST['faculty'];
		$faculty = htmlspecialchars($faculty, ENT_QUOTES, 'UTF-8');
		$status = $_POST['status'];
		$status = htmlspecialchars($status, ENT_QUOTES, 'UTF-8');

		if (file_exists($path_filename_ext)) {
			echo "<script type='text/javascript'>alert('Filename already exists.'); window.history.back();</script>";
		}else{
			$insert = "INSERT into documents (date, imagename, filepath, category, typeOfLeave, professor, faculty, status) 
			values('$date', '$file', '$path_filename_ext','$category','$typeOfLeave','$professor','$faculty','$status')";
			$result = mysqli_query($conn, $insert) or die(mysqli_error());

			move_uploaded_file($temp_name,$path_filename_ext);
			header('Location: documentUploaded.php');
		}
	}
}else{
  	//error
}

?>