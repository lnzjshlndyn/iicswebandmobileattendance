<?php

session_start();

require 'log.php';

$log->lwrite('Logged out user: ' . $_SESSION['username']);

header('Location: logout.php');

?>