<?php

include("../inc/config.php");
include("../class/class.php");
include("../inc/connection.php");

if (isset($_POST["changeId"])) {
 $dataFetcher = new RetrieveData($conn);
 $id = $_POST["changeId"];
 $row = $dataFetcher->fetch($id);

 // output the user data into JSON Format
 header("Content-Type: application/json");
 echo json_encode($row);	

 $connection->closeConnection();
}
?>