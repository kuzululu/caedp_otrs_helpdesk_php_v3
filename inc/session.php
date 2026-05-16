<?php
ob_start();
session_start();

$user_id = $_SESSION["user_id"];
$email = $_SESSION["email"];
$last_name = $_SESSION["last_name"];
$first_name = $_SESSION["first_name"];
$accountType = $_SESSION["account_type"];
$full_name = $first_name . " " . $last_name;

if (!isset($user_id)) {
	header("logout");
}

if (!isset($first_name) AND !isset($last_name)) {
	header("logout");
}

// check if the session username is set if not automatic logout
	if (isset($user_id)) {
		// $message =  $_SESSION["first_name"] . " " . $_SESSION["last_name"];
		
		$first_initials = substr($first_name, 0,1);
		$last_initials = substr($last_name, 0,1);
		$initials = $first_initials . $last_initials;
	
	}else{
		header("location: logout");
	}
?>