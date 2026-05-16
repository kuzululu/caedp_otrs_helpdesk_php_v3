<?php
session_status() === PHP_SESSION_NONE && session_start();

if (isset($_SESSION["user_id"])) {
    	echo json_encode([
    	 "status" => "alive"
    	]);		
   	}else{
    	 echo json_encode([
    	 	"status" => "expired"
    	  ]);
     }

?>