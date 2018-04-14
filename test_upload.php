<?php

include("db_connect.php");

require 'cloudinary/Cloudinary.php';
require 'cloudinary/Uploader.php';
require 'cloudinary/Api.php';

session_start();

\Cloudinary::config(array( 
	"cloud_name" => "ust", 
	"api_key" => "564874384895128", 
	"api_secret" => "_YsCf3z6Mu2yCuLk54Q0vn4UMMU" 
));

if(isset($_POST['roomschedule'])){

	$tmpfile = $_FILES["file"]["tmp_name"];

	foreach ($tmpfile as $key => $filename) {

		$fname = $_FILES['file']['name'][$key];

		\Cloudinary\Uploader::upload("C:\\xampp\\htdocs\\thesis\\$fname", array("public_id" => "$fname", "resource_type" => "auto"));
	}








	//echo cloudinary_url("sample_csv.csv", 
	//	array("resource_type" => "auto")); 


	//echo "<script type='text/javascript'>alert('ULUL');</script>";
}

?>