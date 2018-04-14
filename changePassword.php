<!DOCTYPE html>
<html>
<head>  
	<title>Attendance Monitoring System</title>
	<meta charset="ultf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="LoginBox">
				<img src="images/iicslogomini.png" alt="IICS Seal" class="logo">
				<br><br><br>
				<form action="changePasswordDB.php" method="post">
					<p class="quicksandHeading">Forgot Password</p>
					<div class="form-group">
						<input type="password" name="newpassword" placeholder="New Password" class="form-control" name="password" id="password" required="">
					</div>
					<div class="form-group">
						<input type="password" name="foopassword" placeholder="Re-type Password" class="form-control" name="password" id="password" required="">
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="SubmitButton">Change Password</button>
					</div>
					<div class="col-md-12">
						<br>
					</div>
				</form>
				&nbsp;&nbsp;&nbsp;<a href="login.php" class="LoginForgot">Back to Log In</a>
			</div>
		</div>
	</div>
</body>
</html>