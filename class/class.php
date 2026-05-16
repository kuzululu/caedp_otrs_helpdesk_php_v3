<?php

// short if
session_status() === PHP_SESSION_NONE && session_start();

class DbConnection{
 
private $server;
private $user;
private $pass;
private $dbName;
private $conn;


public function __construct($server, $user, $pass, $dbName){
 
	$this->server = $server;
	$this->user = $user;
	$this->pass = $pass;
	$this->dbName = $dbName;

}

public function connectToDb(){

	$this->conn = new mysqli($this->server, $this->user, $this->pass, $this->dbName);
	if ($this->conn->connect_error) {
		throw new RuntimeException("Connection failed: " . $this->conn->connect_error);
	}
	return $this->conn;

}

public function closeConnection(){
	// for php v5+ legacy if statement
	// $this->conn && $this->conn->close();

	// for php v8+ cleanest
	$this->conn?->close();

}

}

// user technician registration
class UserTechRegistration{
 
 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

// =============================
 // technician registration
 public function register($reg_lname, $reg_fname, $reg_email, $reg_pass, $contact){

 	$reg_lname  = $this->conn->escape_string(trim($reg_lname));
 	$reg_fname  = $this->conn->escape_string(trim($reg_fname));
 	$reg_email  = $this->conn->escape_string(trim($reg_email));
 	$contact  = $this->conn->escape_string(trim($contact));
 	$reg_pass = $this->conn->escape_string(trim($reg_pass));

 	$check_email = "SELECT * FROM tbl_user WHERE email='$reg_email'";
 	$check_contact = "SELECT * FROM tbl_user WHERE contact='$contact'";

 	$check_email_row = $this->conn->query($check_email);
 	$check_contact_row = $this->conn->query($check_contact);

 	$total_email_row = $check_email_row->num_rows;
 	$total_contact_row = $check_contact_row->num_rows;

 	if ($total_email_row > 0 || $total_contact_row > 0) {
 		return "Email or Contact is already registered";
 	}else{
 		$hash = password_hash($reg_pass, PASSWORD_BCRYPT);
 		$account_type = "technician";

 		$sql = "INSERT INTO tbl_user(last_name, first_name, email, password, contact, account_type) VALUES(?,?,?,?,?,?)";
 		$stmt = $this->conn->prepare($sql);
 		$stmt->bind_param("ssssss", $reg_lname, $reg_fname, $reg_email, $hash, $contact, $account_type);
 		$stmt->execute();
 		$stmt->close();
 		return "Successfully Registered";
 	}

 }

// ==============================
 // Admin Registration
 public function Adminregister($reg_lname, $reg_fname, $reg_email, $reg_pass, $contact){

 	$reg_lname  = $this->conn->escape_string(trim($reg_lname));
 	$reg_fname  = $this->conn->escape_string(trim($reg_fname));
 	$reg_email  = $this->conn->escape_string(trim($reg_email));
 	$contact  = $this->conn->escape_string(trim($contact));
 	$reg_pass = $this->conn->escape_string(trim($reg_pass));

 	$check_email = "SELECT * FROM tbl_user WHERE email='$reg_email'";
 	$check_contact = "SELECT * FROM tbl_user WHERE contact='$contact'";

 	$check_email_row = $this->conn->query($check_email);
 	$check_contact_row = $this->conn->query($check_contact);

 	$total_email_row = $check_email_row->num_rows;
 	$total_contact_row = $check_contact_row->num_rows;

 	if ($total_email_row > 0 || $total_contact_row > 0) {
 		return "Email or Contact is already registered";
 	}else{
 		$hash = password_hash($reg_pass, PASSWORD_BCRYPT);
 		$account_type = "admin";

 		$sql = "INSERT INTO tbl_user(last_name, first_name, email, password, contact, account_type) VALUES(?,?,?,?,?,?)";
 		$stmt = $this->conn->prepare($sql);
 		$stmt->bind_param("ssssss", $reg_lname, $reg_fname, $reg_email, $hash, $contact, $account_type);
 		$stmt->execute();
 		$stmt->close();
 		return "Successfully Registered";
 	}

 }
// ==================================== 

}

// =============================
// LOGIN
class UserLogin{

private $conn;

public function __construct($conn){
	$this->conn = $conn;
}

public function login($userLog, $passLog){
 $userLogin = $this->conn->escape_string(trim($userLog));
 $passLogin = $this->conn->escape_string(trim($passLog));

 $sql = "SELECT * FROM tbl_user WHERE email='$userLogin'";
 $get_email = $this->conn->query($sql);
 $total_email = $get_email->num_rows;

 if ($total_email > 0) {
 	
 	while ($row = $get_email->fetch_assoc()) {
 		$user_id = $row["user_id"];
 		$db_lastName = $row["last_name"];
 		$db_firstName = $row["first_name"];
 		$db_email = $row["email"];
 		$db_password = $row["password"];
 		$db_contact = $row["contact"];
 		$db_accountType = $row["account_type"];

 		if (password_verify($passLogin, $db_password) && strcmp($userLogin, $db_email) == 0) {
 				$_SESSION["user_id"] = $user_id;
 				$_SESSION["password"] = $db_password;
 				$_SESSION["email"] = $db_email;
 				$_SESSION["last_name"] = $db_lastName;
 				$_SESSION["first_name"] = $db_firstName;
 				$_SESSION["contact"] = $db_contact;
 				$_SESSION["account_type"] = $db_accountType;

 				// alternative for if stement for account_type
 				$roleMap = [
 					"technician" => "technician",
 					"admin" => "admin"
 				];

 				$redirect = $roleMap[$db_accountType] ?? "user";
 				header("location: $redirect");
 				exit();
 		}else{
 			return "wrong password or kindly considerate the sensitive case of your email";
 		}
 	}
 }else{
 	return "No Account Yet";
  }
 }

}

// =======================
// USER ACCOUNT VIEW
class UserAccount{
 
 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function records(){
 	$email = $_SESSION["email"];
 	$sql = "SELECT * FROM tbl_user WHERE email = '$email' AND  account_type <> 'admin'";
 	$get = $this->conn->query($sql);
 	return $get;
 }

 public function AdminRecords(){
 	$sql = "SELECT * FROM tbl_user ORDER BY user_id DESC";
 	$get = $this->conn->query($sql);
 	return $get;
 }

}

// =============================

// UPDATE ACCOUNT
class UpdateAccount{

	private $conn;

	public function __construct($conn){
		$this->conn = $conn;
	}

	public function update($user_id, $update_lname, $update_fname, $update_email, $contact, $update_pass){

		// retain old password if empty
		if(empty($update_pass)){
				$sql = "UPDATE tbl_user SET last_name=?, first_name=?, email=?, contact=? WHERE user_id=?";
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("ssssi", $update_lname, $update_fname, $update_email, $contact, $user_id);
		}else{
 		$sql = "UPDATE tbl_user SET last_name=?, first_name=?, email=?, password=?, contact=? WHERE user_id=?";
			$stmt = $this->conn->prepare($sql);
			$hash = password_hash($update_pass, PASSWORD_BCRYPT);
			$stmt->bind_param("sssssi", $update_lname, $update_fname, $update_email, $hash, $contact, $user_id);
		}
		$stmt->execute();
		$stmt->close();
		return "Successfully Updated!!";
	}
}
// ===================


// RETRIEVE USER DATA WITH AJAX
class RetrieveData{

private $conn;

public function __construct($conn){
 $this->conn = $conn;
}

public function fetch($id){
	$sql = "SELECT * FROM tbl_user WHERE user_id=?";
	$stmt = $this->conn->prepare($sql);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	$stmt->close();

	return $row;
}

}
// ====================


// FILTER ACCOUNT USER
class FilterAcct{
 
 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function filter($filter){
 	$sql = "SELECT * FROM tbl_user WHERE first_name LIKE '%$filter%' OR last_name LIKE '%$filter%'";
 	$get = $this->conn->query($sql);
 	$total = $get->num_rows;
 	$data = "";

 	$data .="

 	<div class='table-resposive'>
  	<table class='table table-hover table-condensed'>
  	 <thead>
  	 	<tr class='text-center align-middle'>
  	 		<th>No.</th>
  	 		<th>Last Name</th>
  	 		<th>First Name</th>
  	 		<th>Email</th>
  	 		<th>Contact</th>
  	 		<th>Actions</th>
  	 	</tr>
  	 </thead>
  	 <tbody>
 	";

 	if ($total > 0) {
 		$ctr = 1;
 		while ($row = $get->fetch_assoc()) {
 			$data .="

 			<tr class='text-center align-middle'>
      <td>".$ctr."</td> 
      <td>".htmlspecialchars($row["last_name"])."</td> 
      <td>".htmlspecialchars($row["first_name"])."</td> 
      <td>".htmlspecialchars($row["email"])."</td> 
      <td>".htmlspecialchars($row["contact"])."</td> 
      <td><a id='".htmlspecialchars($row['user_id'])."' href='#' class='updatePass btn btn-outline-success btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#modalChangePass'><i class='fa fa-underline'></i></a></td> 
    </tr>

 			";
 			$ctr++;
 		}
 	}else{
 		 $data .="
			 <tr>
			   <td colspan='6' class='text-center fw-bolder'><h3 class='text-danger fw-bolder fst-italic animate__animated animate__fadeIn animate__infinite infinite'>No Record</h3></td>
			 </tr>";
 	}
	$data .="</tbody></table></div>";
 echo $data;
 }
}

if (isset($_POST["acctFilter"])) {
	$filter = $_POST["acctFilter"];
	include("../inc/config.php");
	include("../inc/connection.php");

	$filterLive = new FilterAcct($conn);
	$filterLive->filter($filter);

	$connection->closeConnection();
}
// ============================


// CHANGE USER password_hash
class ChangeUserPassword{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function change($userId, $change_pass){
 	$sql = "UPDATE tbl_user SET password=? WHERE user_id=?";
 	$stmt = $this->conn->prepare($sql);
 	$hash = password_hash($change_pass, PASSWORD_BCRYPT);
 	$stmt->bind_param("si", $hash, $userId);
 	$stmt->execute();
 	$stmt->close();
 	return "Change password Successfully!";
 }

}
//================================ 

// GET ACCOUNT USING URL ID
class GetUserAccount{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function retrieve($id){
 	$sql = "SELECT * FROM tbl_user WHERE user_id=?";
 	$stmt = $this->conn->prepare($sql);
 	$stmt->bind_param("i", $id);
 	$stmt->execute();
 	$result = $stmt->get_result();
 	$row = $result->fetch_assoc();
 	$stmt->close();
 	return $row;
 }
 
}
// ==========================

// TICKETING ID
class TicketingIdGen{
 
 private $generatedCode;

 public function __construct(){
 	$this->generatedCode();
 }

 private function generatedCode(){
 	$uniqueId = str_pad((string) random_int(0, 999999), 6, "0", STR_PAD_LEFT);
 	$this->generatedCode = "DBLS-" . $uniqueId;
 }

 public function getGeneratedCode(){
 	return $this->generatedCode;
 }

}
// =====================


//INSERT TICKET RECORDS
class InsertTicketRecords{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function insert($insert_ticketId, $insert_datetroubleshoot, $insert_service, $insert_endUser, $insert_problem, $insert_asessment, $insert_unitStatus, $insert_remarks, $insert_remSpecify, $insert_statusReport, $insert_statsSpecify, $insert_tech, $insert_techUserid){

 	$sql = "INSERT INTO tbl_edp_logs(ticketId, date_troubleshoot, services, end_user, problem, assessment, unit_status, remarks, remarks_specific, status_report, stats_report_specify, technician, tech_user_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
 	$stmt = $this->conn->prepare($sql);
 	$stmt->bind_param("sssssssssssss", $insert_ticketId, $insert_datetroubleshoot, $insert_service, $insert_endUser, $insert_problem, $insert_asessment, $insert_unitStatus, $insert_remarks, $insert_remSpecify, $insert_statusReport, $insert_statsSpecify, $insert_tech, $insert_techUserid);
 	$stmt->execute();
 	$stmt->close();

 	return "Successfully Added";
 }

}
// ========================


// VIEW RECORDS FOR INCIDENT REPORT
class IncidentRecords{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function records($page=1,$perPage=5){
 	$offset = ($page - 1) * $perPage;
 	$sql = "SELECT * FROM tbl_edp_logs WHERE status_report = 'Incident Report' ORDER BY id DESC LIMIT $perPage OFFSET $offset";
 	$records = $this->conn->query($sql);
 	return $records;
 }

 public function recordsCount(){
 	$sql = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE status_report = 'Incident Report'";
 	$stmt = $this->conn->query($sql);
 	$row = $stmt->fetch_assoc();
 	$total = $row["total"];
 	return $total;
 }

 public function pendingRecords($page=1,$perPage=5){
 	$offset = ($page - 1) * $perPage;
 	$sql = "SELECT * FROM tbl_edp_logs WHERE status_report IS NULL OR trim(status_report) = '' ORDER BY id DESC LIMIT $perPage OFFSET $offset";
 	$records = $this->conn->query($sql);
 	return $records;
 }

 public function pendingRecordsCount(){
 	$sql = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE status_report IS NULL OR trim(status_report) = ''";
 	$stmt = $this->conn->query($sql);
 	$row = $stmt->fetch_assoc();
 	$total = $row["total"];
 	return $total;
 }


 // FOR PRINTING ALL RECORDS
 public function allRecords(){
  $sql = "SELECT * FROM tbl_edp_logs WHERE status_report = 'Incident Report' ORDER BY services ASC";
 	$records = $this->conn->query($sql);
 	return $records;
 }

 public function allRecordsCount(){
 	$sql = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE status_report = 'Incident Report'";
 	$stmt = $this->conn->query($sql);
 	$row = $stmt->fetch_assoc();
 	$total = $row["total"];
 	return $total;
 }

 public function allPendingRecords(){
 	$sql = "SELECT * FROM tbl_edp_logs WHERE status_report IS NULL OR trim(status_report) = '' ORDER BY services ASC";
 	$records = $this->conn->query($sql);
 	return $records;
 }

 public function allPendingRecordsCount(){
 	$sql = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE status_report IS NULL OR trim(status_report) = ''";
 	$stmt = $this->conn->query($sql);
 	$row = $stmt->fetch_assoc();
 	$total = $row["total"];
 	return $total;
 }
 // ==============================

}
// ========================

// COMPLETE RECORDS
class CompleteRecords{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function records($page=1, $perPage=5){
 	$offset = ($page - 1) * 	$perPage;
 	$sql = "SELECT * FROM tbl_edp_logs WHERE status_report <> 'Incident Report' AND trim(status_report) <> '' AND tech_user_id = '".$_SESSION['user_id']."' ORDER BY id DESC LIMIT $perPage OFFSET $offset";
 	$records = $this->conn->query($sql);
 	return $records;
 }

 public function recordsCount(){
 	// $fullName = $_SESSION["first_name"] . " " . $_SESSION["last_name"];
 	$sql = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE status_report <> 'Incident Report' AND trim(status_report) <> '' AND tech_user_id='".$_SESSION['user_id']."'";
 	$stmt = $this->conn->query($sql);
 	$row = $stmt->fetch_assoc();
 	$total = $row["total"];
 	return $total;
 }

 // FOR PRINTING ALL RECORDS
 public function allRecords(){
  $sql = "SELECT * FROM tbl_edp_logs WHERE tech_user_id='".$_SESSION["user_id"]."' ORDER BY services ASC";
  $records = $this->conn->query($sql);
  return $records;	
 }

 public function allRecordsCount(){
 	$sql = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE tech_user_id='".$_SESSION["user_id"]."'";
 	$stmt = $this->conn->query($sql);
 	$row = $stmt->fetch_assoc();
 	$total = $row["total"];
 	return $total;
 }

 // =================================

}
// =========================

// get the records base on request url id
class GetIncidentRecords{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function retrieve($id){
 	$sql = "SELECT * FROM tbl_edp_logs	WHERE id=?";
 	$stmt = $this->conn->prepare($sql);
 	$stmt->bind_param("i", $id);
 	$stmt->execute();
 	$result = $stmt->get_result();
 	$row = $result->fetch_assoc();
 	$stmt->close();
 	return $row;
 }
}

// get the records base on request url id
class GetCompleteRecords{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function retrieve($id){
 	$tech_userId = $_SESSION["user_id"];
 	$sql = "SELECT * FROM tbl_edp_logs	WHERE id=? AND tech_user_id=?";
 	$stmt = $this->conn->prepare($sql);
 	$stmt->bind_param("is", $id, $tech_userId);
 	$stmt->execute();
 	$result = $stmt->get_result();
 	$row = $result->fetch_assoc();
 	$stmt->close();
 	return $row;
 }
}
// ===============

// UPDATE INCIDENT REPORT
class UpdateIncidentReport{

private $conn;
private $fullName;

public function __construct($conn){
	$this->conn = $conn;
	$this->fullName = $_SESSION["first_name"] . " " . $_SESSION["last_name"];
}

public function update($id, $update_ticketId, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $update_tech, $update_techUserId){

if (empty($update_remSpecify) && empty($update_statsSpecify)) {

	$sqlInsert = "INSERT INTO tbl_edp_logs_history(ticketId, date_troubleshoot, services, end_user, problem, assessment, unit_status, remarks, status_report, technician, update_by) SELECT ticketId, date_troubleshoot, services, end_user, problem, assessment, unit_status, remarks, status_report, technician, ? FROM tbl_edp_logs WHERE id=?";
	$stmtInsert = $this->conn->prepare($sqlInsert);
	$stmtInsert->bind_param("si", $this->fullName, $id);
	$stmtInsert->execute();
	$stmtInsert->close();

	$sql = "UPDATE tbl_edp_logs SET ticketId=?, date_troubleshoot=?, services=?, end_user=?, problem=?, assessment=?, unit_status=?, remarks=?, status_report=?, technician=?, tech_user_id=? WHERE id=?";
	$stmt = $this->conn->prepare($sql);
	$stmt->bind_param("sssssssssssi", $update_ticketId, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_statusReport, $update_tech, $update_techUserId, $id);
}else{

	$sqlInsert = "INSERT INTO tbl_edp_logs_history(ticketId, date_troubleshoot, services, end_user, problem, assessment, unit_status, remarks, remarks_specific, status_report, stats_report_specify, technician, update_by) SELECT ticketId, date_troubleshoot, services, end_user, problem, assessment, unit_status, remarks, remarks_specific, status_report, stats_report_specify, technician, ? FROM tbl_edp_logs WHERE id=?";
	$stmtInsert = $this->conn->prepare($sqlInsert);
	$stmtInsert->bind_param("si", $this->fullName, $id);
	$stmtInsert->execute();
	$stmtInsert->close();

	$sql = "UPDATE tbl_edp_logs SET ticketId=?, date_troubleshoot=?, services=?, end_user=?, problem=?, assessment=?, unit_status=?, remarks=?, remarks_specific=?, status_report=?, stats_report_specify=?, technician=?, tech_user_id=? WHERE id=?";
	$stmt = $this->conn->prepare($sql);
	$stmt->bind_param("sssssssssssssi", $update_ticketId, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $update_tech, $update_techUserId, $id);
}

$stmt->execute();
$stmt->close();
return "Successfully Updated!!";
 }
}
// ======================

// UPDATE COMPLETE REPORT
class UpdateCompleteReport{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

public function update($id, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment, $update_unitStatus, $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $update_tech){
$sql = "UPDATE tbl_edp_logs SET date_troubleshoot=?, services=?, end_user=?, problem=?, assessment=?, unit_status=?, remarks=?, remarks_specific=?, status_report=?, stats_report_specify=? WHERE id=? AND technician=?";
$stmt = $this->conn->prepare($sql);
$stmt->bind_param("ssssssssssis", $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $id, $update_tech);
$stmt->execute();
$stmt->close();
return "Successfully Updated!!";
 }

}
// ==============================

// FILTER INCIDENT REPORT
class FilterIncidentReports{
 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }	

 public function filter($filter){
 	// $technician = $_SESSION["first_name"] . " " . $_SESSION["last_name"];
 	$status_report = "Incident Report";

 	$count_query = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE (services LIKE '%$filter%' OR status_report LIKE '%$filter%' OR remarks LIKE '%$filter%') AND status_report='$status_report'";
 	$count_result = $this->conn->query($count_query);
 	$row = $count_result->fetch_assoc();
 	$total_count = $row["total"];

  $sql = "SELECT * FROM tbl_edp_logs WHERE (services LIKE '%$filter%' OR status_report LIKE '%$filter%' OR remarks LIKE '%$filter%') AND status_report = '$status_report'";
 	$get = $this->conn->query($sql);
 	$total = $get->num_rows;
 	$data = "";

 	$data .="

 	<div class='table-responsive'>
  	<table class='table table-hover table-condensed'>
  	 <thead>
  	<tr class='text-center align-middle'>
 		<th>No.</th>
 		<th>Ticket ID</th>
 		<th>Date Troubleshoot</th>
 		<th>Service</th>
 		<th>End User</th>
 		<th>Unit Status</th>
 		<th>Remarks</th>
	    <th>Status Report</th>
	    <th class='hidden'>File</th>
 		<th class='hidden'>Actions</th>
  	 	</tr>
  	 </thead>
  	 <tbody>
 	";

 	if ($total > 0) {
 	 
 	 $ctr = 1;
 	 while ($row = $get->fetch_assoc()) {
	 	$date = $row["date_troubleshoot"];
	 	$newDate = new DateTime($date);
	 	$formatDate = $newDate->format("M d, Y");
 	 
 	 $data .="

 	 <tr class='text-center align-middle'>
  	<td class='align-top'>".$ctr."</td>
  	<td class='align-top'>".htmlspecialchars($row["ticketId"])."</td>
  	<td class='align-top'>".htmlspecialchars($formatDate)."</td>	
  	<td class='align-top'>".htmlspecialchars($row['services'])."</td>	
  	<td class='align-top'>".htmlspecialchars($row['end_user' ])."</td>	
  	<td class='align-top'>".htmlspecialchars($row['unit_status'])."</td>	
  	<td class='align-top'>".htmlspecialchars($row['remarks'])."</td>
    <td class='align-top'>".htmlspecialchars($row['status_report'])."</td>
    <td class='align-top hidden'><a target='_blank' href='../upload/".htmlspecialchars($row['upload_file'])."' class='text-success fst-italic fw-bolder'>".htmlspecialchars(shortenLinkName($row['upload_file']))."</a></td>
  	<td class='hidden'>
  		<a href='incident_report?id=".htmlspecialchars(urlencode(base64_encode($row['id'])))."&&technician=".urlencode(base64_encode($_SESSION['first_name'] . ' ' . $_SESSION['last_name']))."' class='btn btn-outline-secondary btn-sm'><i class='fa-regular fa-eye'></i></a> <a href='#' class='btn btn-outline-primary btn-sm uploadFile' id='".htmlspecialchars($row['id'])."' data-bs-toggle='modal' data-bs-target='#modalFileUpload'><i class='fa-regular fa-file'></i></a>
  	</td>
  </tr>
 	 ";

 	 $ctr++;	
 	 }
 	 $data .="
 		<tr>
 		 <th class='border border-2 fw-bolder' colspan='2'>Total:</th>
 		 <td class='border border-2 text-success fw-bolder'>".$total_count."</td>
 		</tr>
 		";
 	}else{
 	 $data .="
 <tr>
   <td colspan='9' class='text-center fw-bolder'><h3 class='text-danger fw-bolder fst-italic animate__animated animate__fadeIn animate__infinite infinite'>No Record</h3></td>
 </tr>";
  }
 $data .="</tbody></table></div>";
 echo $data;
 }
}


if (isset($_POST["filterIncidentReport"])) {
	$filter = $_POST["filterIncidentReport"];
	include("../inc/config.php");
	include("../inc/connection.php");
	include("../inc/shortLink.php");

	$filterLive = new FilterIncidentReports($conn);
	$filterLive->filter($filter);

	$connection->closeConnection();
}
// =====================

// COMPLETE RECORDS FILTER
class CompleteRecordsFilter{
 
 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function filter($filter){

 	$technician = $_SESSION["first_name"] . " " . $_SESSION["last_name"];

 	$count_query = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE (services LIKE '%$filter%' OR status_report LIKE '%$filter%' OR remarks LIKE '%$filter%') AND trim(status_report) <> '' AND status_report <> 'Incident Report' AND technician='$technician'";
 	$count_result = $this->conn->query($count_query);
 	$row = $count_result->fetch_assoc();
 	$total_count = $row["total"];

 	$sql = "SELECT * FROM tbl_edp_logs WHERE (services LIKE '%$filter%' OR status_report LIKE '%$filter%' OR remarks LIKE '%$filter%') AND trim(status_report) <> '' AND status_report <> 'Incident Report' AND technician = '$technician'";
 	$get = $this->conn->query($sql);
 	$total = $get->num_rows;
 	$data = "";

 	$data .="

 	<div class='table-responsive'>
  	<table class='table table-hover'>
  	 <thead>
  	 	<tr class='text-center align-middle'>
 		<th>No.</th>
 		<th>Ticket ID</th>
 		<th>Date Troubleshoot</th>
 		<th>Service</th>
 		<th>End User</th>
 		<th>Unit Status</th>
 		<th>Remarks</th>
        <th>Status Report</th>
        <th class='hidden'>File</th>
  	 	<th class='hidden'>Actions</th>
  	 	</tr>
  	 </thead>
  	 <tbody>
 	";

 	if ($total > 0) {
 		
 		$ctr = 1;
 		 while ($row = $get->fetch_assoc()) {
 			$date = $row["date_troubleshoot"];
		 	$newDate = new DateTime($date);
		 	$formatDate = $newDate->format("M d, Y");

		 	$data .="

		 <tr class='text-center align-middle'>
		  	<td class='align-top'>".$ctr."</td>
		  	<td class='align-top'>".htmlspecialchars($row["ticketId"])."</td>
		   <td class='align-top'>".htmlspecialchars($formatDate)."</td>	
		  	<td class='align-top'>".htmlspecialchars($row["services"])."</td>	
		  	<td class='align-top'>".htmlspecialchars($row["end_user" ])."</td>	
		  	<td class='align-top'>".htmlspecialchars($row["unit_status"])."</td>	
		  	<td class='align-top'>".htmlspecialchars($row["remarks"])."</td>
		   <td class='align-top'>".htmlspecialchars($row["status_report"])."</td>
		   <td class='hidden align-top'><a target='_blank' href='../upload/".htmlspecialchars($row['upload_file'])."' class='text-success fst-italic fw-bolder'>".htmlspecialchars(shortenLinkName($row['upload_file']))."</a></td>
		  	<td class='hidden'>
  			<a href='complete_report?id=".htmlspecialchars(urlencode(base64_encode($row['id'])))."&&technician=". urlencode(base64_encode($_SESSION['first_name'] . ' ' . $_SESSION['last_name']))."' class='btn btn-outline-secondary btn-sm'><i class='fa-regular fa-eye'></i></a> <a href='#' class='btn btn-outline-primary btn-sm uploadFile' id='".htmlspecialchars($row['id'])."' data-bs-toggle='modal' data-bs-target='#modalFileUpload'><i class='fa-regular fa-file'></i></a>
  	</td>
  </tr>";
 			$ctr++;
 		}

 		$data .="
 		<tr>
 		 <th class='border border-2 fw-bolder' colspan='2'>Total:</th>
 		 <td class='border border-2 text-success fw-bolder'>".$total_count."</td>
 		</tr>
 		";

 	}else{
 		 $data .="
			 <tr>
			   <td colspan='9' class='text-center fw-bolder'><h3 class='text-danger fw-bolder fst-italic animate__animated animate__fadeIn animate__infinite infinite'>No Record</h3></td>
			 </tr>";
			}
	 	$data .="</tbody></table></div>";
	 	echo $data;
 	}
 }

if (isset($_POST["filterCompleteReport"])) {
	$filter = $_POST["filterCompleteReport"];
	include("../inc/config.php");
	include("../inc/connection.php");
	include("../inc/shortLink.php");

	$filterLive = new CompleteRecordsFilter($conn);
	$filterLive->filter($filter);

	$connection->closeConnection();
}
// =========================


// FILTER PENDING RECORDS
class PendingRecordsFilter{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function filter($filter){

 	$count_query = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE (status_report IS NULL OR trim(status_report) = '') AND (services LIKE '%$filter%' OR status_report LIKE '%$filter%' OR remarks LIKE '%$filter%')";
 	$count_result = $this->conn->query($count_query);
 	$row = $count_result->fetch_assoc();
 	$total_count = $row["total"];

 	$sql = "SELECT * FROM tbl_edp_logs WHERE (status_report IS NULL OR trim(status_report) = '') AND (services LIKE '%$filter%' OR status_report LIKE '%$filter%' OR remarks LIKE '%$filter%') ORDER BY id DESC";
 	$get = $this->conn->query($sql);
 	$total = $get->num_rows;
 	$data = "";

 	$data .="

 	<div class='table-responsive'>
  	<table class='table table-hover'>
  	 <thead>
  	 	<tr class='text-center align-middle'>
  	 		<th>No.</th>
  	 		<th>Ticket ID</th>
  	 		<th>Date Troubleshoot</th>
  	 		<th>Service</th>
  	 		<th>End User</th>
  	 		<th>Unit Status</th>
  	 		<th>Remarks</th>
        <th class='hidden'>Status Report</th>
        <th class='hidden'>File</th>
  	 		<th>Actions</th>
  	 	</tr>
  	 </thead>
  	 <tbody>
 	";

 	if ($total > 0) {
 		
 		$ctr = 1;
 		 while ($row = $get->fetch_assoc()) {
 			$date = $row["date_troubleshoot"];
		 	$newDate = new DateTime($date);
		 	$formatDate = $newDate->format("M d, Y");

		 	$data .="

		 <tr class='text-center align-middle'>
  	<td class='align-top'>".$ctr."</td>
  	<td class='align-top'>".htmlspecialchars($row["ticketId"])."</td>
   <td class='align-top'>".htmlspecialchars($formatDate)."</td>	
  	<td class='align-top'>".htmlspecialchars($row["services"])."</td>	
  	<td class='align-top'>".htmlspecialchars($row["end_user" ])."</td>	
  	<td class='align-top'>".htmlspecialchars($row["unit_status"])."</td>	
  	<td class='align-top'>".htmlspecialchars($row["remarks"])."</td>
   <td class='align-top'>".nl2br(str_replace(["\\r\\n","\\n",'\\"'],["\n","\n",'"'], htmlspecialchars($row["status_report"])))."</td>
   <td class='hidden align-top'><a target='_blank' href='../upload/".htmlspecialchars($row['upload_file'])."' class='text-success fst-italic fw-bolder'>".htmlspecialchars(shortenLinkName($row['upload_file']))."</a></td>
  	<td class='hidden'>
  		<a href='complete_report?id=".htmlspecialchars(urlencode(base64_encode($row['id'])))."&&technician=". urlencode(base64_encode($_SESSION['first_name'] . ' ' . $_SESSION['last_name']))."' class='btn btn-outline-secondary btn-sm'><i class='fa-regular fa-eye'></i></a> <a href='#' class='btn btn-outline-primary btn-sm uploadFile' id='".htmlspecialchars($row['id'])."' data-bs-toggle='modal' data-bs-target='#modalFileUpload'><i class='fa-regular fa-file'></i></a>
  	</td>
  </tr>";
 			$ctr++;
 		}

 		$data .="
 		<tr>
 		 <th class='border border-2 fw-bolder' colspan='2'>Total:</th>
 		 <td class='border border-2 text-success fw-bolder'>".$total_count."</td>
 		</tr>
 		";

 	}else{
 		 $data .="
			 <tr>
			   <td colspan='9' class='text-center fw-bolder'><h3 class='text-danger fw-bolder fst-italic animate__animated animate__fadeIn animate__infinite infinite'>No Record</h3></td>
			 </tr>";
			}
	 	$data .="</tbody></table></div>";
	 	echo $data;
 }
}

if (isset($_POST["filterPendingReport"])) {
	$filter = $_POST["filterPendingReport"];
	include("../inc/config.php");
	include("../inc/connection.php");
	include("../inc/shortLink.php");

	$filterLive = new PendingRecordsFilter($conn);
	$filterLive->filter($filter);

	$connection->closeConnection();
}
// ============================

// VIEW RECORDS FOR ADMIN SIDE
class RecordsManager{
	private $conn;

	public function __construct($conn){
		$this->conn = $conn;
	}

	public function records($page=1, $perPage=5){
		$offset = ($page - 1) * $perPage;
		$sql = "SELECT * FROM tbl_edp_logs ORDER BY id DESC LIMIT $perPage OFFSET $offset";
		$records = $this->conn->query($sql);
		return $records;
	}

	public function recordsCount(){
		$sql = "SELECT COUNT(*) AS total FROM tbl_edp_logs";
		$stmt = $this->conn->query($sql);
		$row = $stmt->fetch_assoc();
		$total = $row["total"];
		return $total;
	}
}
// ===========================


// PRINT ALL RECORDS IN ADMIN SIDE

// VIEW ALL RECORDS
class AllRecordsAdminManager{
 
 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function allRecords(){
  $sql = "SELECT * FROM tbl_edp_logs ORDER BY technician ASC, services ASC"; //make groups per technician
  $records = $this->conn->query($sql);
  return $records;
 }

 public function allRecordsCount(){
  $sql = "SELECT COUNT(*) AS total FROM tbl_edp_logs";
  $stmt = $this->conn->query($sql);
  $row = $stmt->fetch_assoc();
  $total = $row["total"];
  return $total;
 }
}
// =====================


// ================================

// VIEW HISTORY RECORDS FOR ADMIN
class HistoryRecordsManager{
	private $conn;

	public function __construct($conn){
		$this->conn = $conn;
	}

	public function records($page=1, $perPage=5){
		$offset = ($page - 1) * $perPage;
		$sql = "SELECT * FROM tbl_edp_logs_history ORDER BY id DESC LIMIT $perPage OFFSET $offset";
		$records = $this->conn->query($sql);
		return $records;
	}

	public function recordsCount(){
		$sql = "SELECT COUNT(*) AS total FROM tbl_edp_logs_history";
		$stmt = $this->conn->query($sql);
		$row = $stmt->fetch_assoc();
		$total = $row["total"];
		return $total;
	}
}
// ==============================


// FILTER RECORDS FOR ADMIN
class FilterRecordsManager{
 
 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function filter($filter){

 	$count_query = "SELECT COUNT(*) AS total FROM tbl_edp_logs WHERE services LIKE '%$filter%' OR end_user LIKE '%$filter%' OR status_report LIKE '%$filter%' OR technician LIKE '%$filter%'";
 	$count_result = $this->conn->query($count_query);
 	$row = $count_result->fetch_assoc();
 	$total_count = $row["total"];

 	$sql = "SELECT * FROM tbl_edp_logs WHERE services LIKE '%$filter%' OR end_user LIKE '%$filter%' OR status_report LIKE '%$filter%' OR technician LIKE '%$filter%' ORDER BY services ASC";
 	$get = $this->conn->query($sql);
 	$total = $get->num_rows;
 	$data = "";

 	$data .="

 	<div class='table-responsive'>
  	<table class='table table-hover table-condensed'>
  	 <thead>
  	 	<tr class='text-center align-middle'>
  	 		<th>No.</th>
      <th>Ticket ID</th>
  	 		<th>Date Troubleshoot</th>
  	 		<th>Service</th>
  	 		<th>End User</th>
  	 		<th>Unit Status</th>
  	 		<th>Remarks</th>
      <th>Status Report</th>
      <th>Technician</th>
      <th class='hidden'>File</th>
  	 		<th class='hidden'>Actions</th>
  	 	</tr>
  	 </thead>
  	 <tbody>";

  	if ($total > 0) {
  		$ctr = 1;
  		while ($row = $get->fetch_assoc()) {
  		$date = $row["date_troubleshoot"];
		 	$newDate = new DateTime($date);
		 	$formatDate = $newDate->format("M d, Y");

  		$data .="
		  	<tr class='text-center align-middle'>
		  	<td class='align-top'>".$ctr."</td>
		    <td class='align-top'>".htmlspecialchars($row["ticketId"])."</td> 
		  	<td class='align-top'>".htmlspecialchars($formatDate)."</td>	
		  	<td class='align-top'>".htmlspecialchars($row["services"])."</td>	
		  	<td class='align-top'>".htmlspecialchars($row["end_user" ])."</td>	
		  	<td class='align-top'>".htmlspecialchars($row["unit_status"])."</td>	
		  	<td class='align-top'>".htmlspecialchars($row["remarks"])."</td>
		    <td class='align-top'>".htmlspecialchars($row["status_report"])."</td>
		    <td class='align-top'>".htmlspecialchars($row["technician"])."</td>
		    <td class='align-top hidden'><a target='_blank' href='../upload/".htmlspecialchars($row['upload_file'])."' class='text-success fst-italic fw-bolder'>".htmlspecialchars(shortenLinkName($row['upload_file']))."</a></td>
		  	<td>
		  		<a href='details?id=".htmlspecialchars(urlencode(base64_encode($row['id'])))."' class='btn btn-outline-secondary btn-sm hidden'><i class='fa-regular fa-eye'></i></a>
		  	</td>
		  </tr>";
  				$ctr++;
  		 }
  		 $data .="
			 		<tr>
			 		 <th class='border border-2 fw-bolder' colspan='2'>Total:</th>
			 		 <td class='border border-2 text-success fw-bolder'>".$total_count."</td>
			 		</tr>
			 		";
  	 }else{
  	 $data .="
			 <tr>
			   <td colspan='9' class='text-center fw-bolder'><h3 class='text-danger fw-bolder fst-italic animate__animated animate__fadeIn animate__infinite infinite'>No Record</h3></td>
			 </tr>";
  	 } 
  	 $data .="</tbody></table></div>";
 			echo $data;
 }
}

if (isset($_POST["filterAdminRecords"])) {
	$filter = $_POST["filterAdminRecords"];
	include("../inc/config.php");
	include("../inc/connection.php");
	include("../inc/shortLink.php");

	$filterLive = new FilterRecordsManager($conn);
	$filterLive->filter($filter);

	$connection->closeConnection();
}
// ======================

// get the records base on request url id
class GetDetailRecords{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function retrieve($id){
 	$sql = "SELECT * FROM tbl_edp_logs	WHERE id=?";
 	$stmt = $this->conn->prepare($sql);
 	$stmt->bind_param("i", $id);
 	$stmt->execute();
 	$result = $stmt->get_result();
 	$row = $result->fetch_assoc();
 	$stmt->close();
 	return $row;
 }
}


// GET THE HISTORY RECORDS ON REQUEST ID URL ID 
class GetHistoryDetailRecords{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function retrieve($id){
 	$sql = "SELECT * FROM tbl_edp_logs_history	WHERE id=?";
 	$stmt = $this->conn->prepare($sql);
 	$stmt->bind_param("i", $id);
 	$stmt->execute();
 	$result = $stmt->get_result();
 	$row = $result->fetch_assoc();
 	$stmt->close();
 	return $row;
 }
}
// ==================================


// FILTER HISTORY RECORDS
class FilterHistoryRecords{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function filter($filter){

 	$count_query = "SELECT COUNT(*) AS total FROM tbl_edp_logs_history WHERE services LIKE '%$filter%' OR status_report LIKE '%$filter%' OR remarks LIKE '%$filter%' OR technician LIKE '%$filter%' OR update_by LIKE '%$filter%'";
 	$count_result = $this->conn->query($count_query);
 	$row = $count_result->fetch_assoc();
 	$total_count = $row["total"];

 	$sql = "SELECT * FROM tbl_edp_logs_history WHERE services LIKE '%$filter%' OR status_report LIKE '%$filter%' OR remarks LIKE '%$filter%'  OR technician LIKE '%$filter%' OR update_by LIKE '%$filter%' ORDER BY id DESC";
 	$get = $this->conn->query($sql);
 	$total = $get->num_rows;
 	$data = "";

 	$data .="
 	<div class='table-responsive'>
  	<table class='table table-hover table-condensed'>
  	 <thead>
  	 	<tr class='text-center align-middle'>
  	 	<th>No.</th>
        <th>Ticket ID</th>
 		<th>Date Troubleshoot</th>
 		<th>Service</th>
 		<th>End User</th>
 		<th>Unit Status</th>
 		<th>Remarks</th>
      	<th>Status Report</th>
      	<th>Technician</th>
      	<th>Resolved By</th>
  	 	<th>Actions</th>
  	 	</tr>
  	 </thead>
  	 <tbody>";

  	 if ($total > 0) {
  	 	$ctr = 1;
  	 	while ($row = $get->fetch_assoc()) {
  	 		$date = $row["date_troubleshoot"];
		 			$newDate = new DateTime($date);
		 			$formatDate = $newDate->format("M d, Y");

		 		$data .="
					 <tr class='text-center align-middle'>
			  	<td class='align-top'>".$ctr."</td>
			   <td class='align-top'>".htmlspecialchars($row["ticketId"])."</td> 
			  	<td class='align-top'>".htmlspecialchars($formatDate)."</td>	
			  	<td class='align-top'>".htmlspecialchars($row["services"])."</td>	
			  	<td class='align-top'>".htmlspecialchars($row["end_user" ])."</td>	
			  	<td class='align-top'>".htmlspecialchars($row["unit_status"])."</td>	
			  	<td class='align-top'>".htmlspecialchars($row["remarks"])."</td>
			   <td class='align-top'>".htmlspecialchars($row["status_report"])."</td>
			   <td class='align-top'>".htmlspecialchars($row["technician"])."</td>
			   <td class='align-top'>".htmlspecialchars($row["update_by"])."</td>
			  	<td>
			  		<a href='details_history?id=".htmlspecialchars(urlencode(base64_encode($row['id'])))."' class='btn btn-outline-secondary btn-sm'><i class='fa-regular fa-eye'></i></a>
			  	</td>
			  </tr>
		 		";
						$ctr++;
  	 	}
  	 	$data .="
		 		<tr>
		 		 <th class='border border-2 fw-bolder' colspan='2'>Total:</th>
		 		 <td class='border border-2 text-success fw-bolder'>".$total_count."</td>
		 		</tr>
		 		";
  	 }else{
  	 	$data .="
			 <tr>
			   <td colspan='11' class='text-center fw-bolder'><h3 class='text-danger fw-bolder fst-italic animate__animated animate__fadeIn animate__infinite infinite'>No Record</h3></td>
			 </tr>";
  	 }
  $data .="</tbody></table></div>";
	 echo $data;
 }
}

if (isset($_POST["filterHistoryRecords"])) {
	$filter = $_POST["filterHistoryRecords"];
	include("../inc/config.php");
	include("../inc/connection.php");

	$filterLive = new FilterHistoryRecords($conn);
	$filterLive->filter($filter);

	$connection->closeConnection();
}
// =======================

// UPDATE PENDING REPORT
class UpdatePendingReport{

private $conn;
private $fullName;

public function __construct($conn){
	$this->conn = $conn;
	$this->fullName = $_SESSION["first_name"] . " " . $_SESSION["last_name"];
}

public function update($id, $update_ticketId, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $update_techUserId){

if (empty($update_remSpecify) && empty($update_statsSpecify)) {

	$sqlInsert = "INSERT INTO tbl_edp_logs_history(ticketId, date_troubleshoot, services, end_user, problem, assessment, unit_status, remarks, status_report, technician, update_by) SELECT ticketId, date_troubleshoot, services, end_user, problem, assessment, unit_status, remarks, status_report, technician, ? FROM tbl_edp_logs WHERE id=?";
	$stmtInsert = $this->conn->prepare($sqlInsert);
	$stmtInsert->bind_param("si", $this->fullName, $id);
	// $stmtInsert->bind_param("i",$id);
	$stmtInsert->execute();
	$stmtInsert->close();

	$sql = "UPDATE tbl_edp_logs SET ticketId=?, date_troubleshoot=?, services=?, end_user=?, problem=?, assessment=?, unit_status=?, remarks=?, status_report=?, technician=?, tech_user_id=? WHERE id=?";
	$stmt = $this->conn->prepare($sql);
	$stmt->bind_param("sssssssssssi", $update_ticketId, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_statusReport, $update_tech, $update_techUserId, $id);
}else{

	$sqlInsert = "INSERT INTO tbl_edp_logs_history(ticketId, date_troubleshoot, services, end_user, problem, assessment, unit_status, remarks, remarks_specific, status_report, stats_report_specify, technician, update_by) SELECT ticketId, date_troubleshoot, services, end_user, problem, assessment, unit_status, remarks, remarks_specific, status_report, stats_report_specify, technician, ? FROM tbl_edp_logs WHERE id=?";
	$stmtInsert = $this->conn->prepare($sqlInsert);
	$stmtInsert->bind_param("si", $this->fullName, $id);
	// $stmtInsert->bind_param("i",$id);
	$stmtInsert->execute();
	$stmtInsert->close();

	$sql = "UPDATE tbl_edp_logs SET ticketId=?, date_troubleshoot=?, services=?, end_user=?, problem=?, assessment=?, unit_status=?, remarks=?, remarks_specific=?, status_report=?, stats_report_specify=?, technician=?, tech_user_id=? WHERE id=?";
	$stmt = $this->conn->prepare($sql);
	$stmt->bind_param("sssssssssssssi", $update_ticketId, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $update_tech, $update_techUserId, $id);
}

$stmt->execute();
$stmt->close();
return "Successfully Updated!!";
 }
}
// ======================

// TECHNICIAN AJAX RETRIEVE DATA
class RetrieveTechData{

 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function fetch($id){
 	$sql = "SELECT * FROM tbl_edp_logs WHERE id=?";
 	$stmt = $this->conn->prepare($sql);
 	$stmt->bind_param("i", $id);
 	$stmt->execute();
 	$result = $stmt->get_result();
 	$row = $result->fetch_assoc();
 	$stmt->close();
 	return $row;
 }
}
// ========================

// UPLOAD DATA FOR TECHNICIAN PROOF
class UploadData{
 
 private $conn;

 public function __construct($conn){
 	$this->conn = $conn;
 }

 public function uploadFile($file){
 	$origName = $file["name"];
 	$ext = pathinfo($origName, PATHINFO_EXTENSION);
 	$newFile = uniqid() . "_" . $origName;
 	$dest = "../upload/" . $newFile;

 	while (file_exists($dest)) {
 		$newFile = uniqid() . "_" . $origName;
 		$dest = "../upload/" . $newFile;
 	}
 	move_uploaded_file($file["tmp_name"], $dest);
 	return $newFile;
 }

 public function upload($fileUploadId, $newFile){
 	$sql = "UPDATE tbl_edp_logs SET upload_file=? WHERE id=?";
 	$stmt = $this->conn->prepare($sql);
 	$stmt->bind_param("si", $newFile, $fileUploadId);
 	$stmt->execute();
 	$stmt->close();

 	return "Success upload";
 }

}
// =========================
?>