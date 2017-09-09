<?php
	include 'code.php';
	$users = new Users();
	if($users->delete(intval($_GET['id']))) {
		header("Location: index.php");
	} else {
		echo "No user found";
	}