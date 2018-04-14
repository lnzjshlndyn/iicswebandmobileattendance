<?php

include("db_connect.php");
session_start();

require 'log.php';

if(isset($_POST['submit'])){

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if ($username == "" || $password == "") {
        echo "<script type='text/javascript'>alert('Fill all fields.'); window.history.back();</script>";
    }else{

        $login1 = "SELECT * from login where username = '$username' AND password = md5('$password')";
        $login2 = "SELECT * from login where username = '$username' AND code = md5('$password')";
        $rLogin1 = mysqli_query($conn, $login1);
        $rLogin2 = mysqli_query($conn, $login2);

        $row1 = mysqli_fetch_assoc($rLogin1);
        $row2 = mysqli_fetch_assoc($rLogin2);

        if (is_array($row1) && !empty($row1)) {
            $_SESSION['id'] = $row1['id'];
            $_SESSION['role'] = $row1['role'];
            $_SESSION['username'] = $row1['username'];
            $_SESSION['email'] = $row1['email'];
            $log->lwrite('Logged in user: ' . $_SESSION['username']);
            header('Location: attendance.php');
        }elseif (is_array($row2) && !empty($row2)) {
            $_SESSION['id'] = $row2['id'];
            $_SESSION['role'] = $row2['role'];
            $_SESSION['username'] = $row2['username'];
            $_SESSION['email'] = $row2['email'];
            $log->lwrite('Recovery password entered by: '. $_SESSION['username']);
            header('Location: changePassword.php');
        } else {
            $log->lwrite('Failed login attempt by: '.$username) ;
            header('Location: loginFailed.php');
        }
    }
}

?>
