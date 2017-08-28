<?php
	require_once "init.php";
	
	unset($_SESSSION['user']);
	session_destroy();
	
	header('Location: ../index.php');
?>