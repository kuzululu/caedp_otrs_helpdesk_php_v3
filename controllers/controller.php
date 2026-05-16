<?php

// add records
if (isset($_POST["btnInsertRecords"])) {

	// for safe use (?? "" Null Coalescing Operator) to prevent Undefined array key for disabled field, no input, optional field
	$insert_ticketId = $conn->escape_string(trim($_POST["insert_ticketId"]));
	$insert_datetroubleshoot = $conn->escape_string(trim($_POST["insert_datetroubleshoot"]));
	$insert_service = $conn->escape_string(trim($_POST["insert_service"]));
	$insert_endUser = $conn->escape_string(trim($_POST["insert_endUser"]));
	$insert_problem = $conn->escape_string(trim($_POST["insert_problem"]));
	$insert_asessment = $conn->escape_string(trim($_POST["insert_asessment"]));
	$insert_unitStatus = $conn->escape_string(trim($_POST["insert_unitStatus"]));
	$insert_remarks = $conn->escape_string(trim($_POST["insert_remarks"]));
	$insert_remSpecify = $conn->escape_string(trim($_POST["insert_remSpecify"] ?? ""));
	$insert_statusReport = $conn->escape_string(trim($_POST["insert_statusReport"]));
	$insert_statsSpecify = $conn->escape_string(trim($_POST["insert_statsSpecify"] ?? ""));
	$insert_tech = $conn->escape_string(trim($_POST["insert_tech"]));
	$insert_techUserid = $conn->escape_string(trim($_POST["insert_techUserid"]));

	$insert = new InsertTicketRecords($conn);

	$result = $insert->insert($insert_ticketId, $insert_datetroubleshoot, $insert_service, ucwords($insert_endUser), $insert_problem, $insert_asessment, $insert_unitStatus, $insert_remarks, $insert_remSpecify, $insert_statusReport, $insert_statsSpecify, $insert_tech, $insert_techUserid);
	// short if
   	$result && showAlertSuccess($result);
}
// ==================

// UPDATE INCIDENT REPORT
if (isset($_POST["btnUpdateIncidentReport"])) {
 $dataUpdate = new UpdateIncidentReport($conn);

 $id = $conn->escape_string(trim($_POST["update_id"]));
 $update_ticketId = $conn->escape_string(trim($_POST["update_ticketId"]));
 $update_datetroubleshoot = $conn->escape_string(trim($_POST["update_datetroubleshoot"]));
 $update_service = $conn->escape_string(trim($_POST["update_service"]));
 $update_endUser = $conn->escape_string(trim($_POST["update_endUser"]));
 $update_problem = $conn->escape_string(trim($_POST["update_problem"]));
 $update_asessment = $conn->escape_string(trim($_POST["update_asessment"]));
 $update_unitStatus = $conn->escape_string(trim($_POST["update_unitStatus"]));
 $update_remarks = $conn->escape_string(trim($_POST["update_remarks"]));
 $update_remSpecify = $conn->escape_string(trim($_POST["update_remSpecify"]));
 $update_statusReport = $conn->escape_string(trim($_POST["update_statusReport"]));
 $update_statsSpecify = $conn->escape_string(trim($_POST["update_statsSpecify"]));
 $update_tech = $conn->escape_string(trim($_POST["update_tech"]));
 $update_techUserId = $conn->escape_string(trim($_POST["update_techUserId"]));

 $result = $dataUpdate->update($id, $update_ticketId, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $update_tech, $update_techUserId);
 // short if
   $result && showAlertUpdateSuccess($result);
}
// =======================

// UPDATE COMPLETE REPORT
if (isset($_POST["btnUpdateRecords"])) {
	$dataUpdate = new UpdateCompleteReport($conn);

 $id = $conn->escape_string(trim($_POST["update_id"]));
 $update_datetroubleshoot = $conn->escape_string(trim($_POST["update_datetroubleshoot"]));
 $update_service = $conn->escape_string(trim($_POST["update_service"]));
 $update_endUser = $conn->escape_string(trim($_POST["update_endUser"]));
 $update_problem = $conn->escape_string(trim($_POST["update_problem"]));
 $update_asessment = $conn->escape_string(trim($_POST["update_asessment"]));
 $update_unitStatus = $conn->escape_string(trim($_POST["update_unitStatus"]));
 $update_remarks = $conn->escape_string(trim($_POST["update_remarks"]));
 $update_remSpecify = $conn->escape_string(trim($_POST["update_remSpecify"]));
 $update_statusReport = $conn->escape_string(trim($_POST["update_statusReport"]));
 $update_statsSpecify = $conn->escape_string(trim($_POST["update_statsSpecify"]));
 $update_tech = $conn->escape_string(trim($_POST["update_tech"]));
 $update_techUserId = $conn->escape_string(trim($_POST["update_techUserId"]));

 $result = $dataUpdate->update($id, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $update_tech, $update_techUserId);
 // short if
   $result && showAlertUpdateSuccess($result);
}
// =========================


// UPDATE PENDING REPORT
if (isset($_POST["btnUpdatePending"])) {
 $dataUpdate = new UpdatePendingReport($conn);

 $id = $conn->escape_string(trim($_POST["update_id"]));
 $update_ticketId = $conn->escape_string(trim($_POST["update_ticketId"]));
 $update_datetroubleshoot = $conn->escape_string(trim($_POST["update_datetroubleshoot"]));
 $update_service = $conn->escape_string(trim($_POST["update_service"]));
 $update_endUser = $conn->escape_string(trim($_POST["update_endUser"]));
 $update_problem = $conn->escape_string(trim($_POST["update_problem"]));
 $update_asessment = $conn->escape_string(trim($_POST["update_asessment"]));
 $update_unitStatus = $conn->escape_string(trim($_POST["update_unitStatus"]));
 $update_remarks = $conn->escape_string(trim($_POST["update_remarks"]));
 $update_remSpecify = $conn->escape_string(trim($_POST["update_remSpecify"]));
 $update_statusReport = $conn->escape_string(trim($_POST["update_statusReport"]));
 $update_statsSpecify = $conn->escape_string(trim($_POST["update_statsSpecify"]));
 // $update_tech = $conn->escape_string(trim($_POST["update_tech"]));
 $update_techUserId = $conn->escape_string(trim($_POST["update_techUserId"]));

 // $result = $dataUpdate->update($id, $update_ticketId, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $update_tech, $update_techUserId);
 $result = $dataUpdate->update($id, $update_ticketId, $update_datetroubleshoot, $update_service, $update_endUser, $update_problem, $update_asessment,  $update_unitStatus,  $update_remarks, $update_remSpecify, $update_statusReport, $update_statsSpecify, $update_techUserId);
 // short if
   $result && showAlertUpdateSuccess($result);
}
// =======================


// UPLOAD FILE FOR TECHNICIAN
if (isset($_POST["btnUploadFile"])) {
 $dataUpdate = new UploadData($conn);

 if (!empty($_POST["fileUploadId"])) {
 	$id = $conn->escape_string(trim($_POST["fileUploadId"]));
 	$file_upload = $_FILES["file_upload"];

 	$newFile = $dataUpdate->uploadFile($file_upload);
 	$result = $dataUpdate->upload($id, $newFile);
 	// short if
   $result && showAlertSuccess($result);
 }	
}
// ============================
?>