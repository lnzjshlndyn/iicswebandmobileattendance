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
				<form action="loginAuth.php" method="post">
					<div class="form-group">
						<input type="text" placeholder="Username" class="form-control" name="username" id="username" required="">
					</div>
					<div class="form-group">
						<input type="password" placeholder="Password" class="form-control" name="password" id="password" required="">
					</div>
					<div class="form-group">
					<button type="submit" name="submit" class="SubmitButton">Log in</button>
					</div>
					<p class="LoginFailed">The account name or password that you have entered is incorrect.</p>
					<div class="form-group">
					</div>
				</form>
				<a href="forgotPassword.php" class="LoginForgot">Forgot Password?</a> 
			</div>
		</div>
	</div>
</body>
</html>