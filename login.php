<!DOCTYPE html>
<html>
<head>
	<title>Attendance Monitoring System</title>
	<meta charset="ultf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="LoginBox">
				<img src="images/iicslogomini.png" alt="IICS Seal" class="logo">
				<br><br><br>
				<form action="loginAuth.php" method="post">
					<div class="form-group">
						<input type="text" placeholder="Username" class="form-control" name="username" id="username" required>
					</div>
					<div class="form-group">
						<input type="password" placeholder="Password" class="form-control" name="password" id="password" required>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="SubmitButton">Log in</button>
					</div>
					<div class="col-md-12">
						<br>
					</div>
				</form>
				<a href="forgotPassword.php" class="LoginForgot">Forgot Password?</a> 
			</div>
		</div>
	</div>
</body>
</html>