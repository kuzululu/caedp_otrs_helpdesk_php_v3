<?php

// technician registration
if (isset($_POST["btnTechReg"])) {
	$reg_lname = $conn->escape_string($_POST["reg_lname"]);
	$reg_fname = $conn->escape_string($_POST["reg_fname"]);
	$reg_email = $conn->escape_string($_POST["reg_email"] . "@comappt.gov.ph");
	$reg_pass = $conn->escape_string($_POST["reg_pass"]);
	$contact = $conn->escape_string($_POST["contact"]);

	$register = new UserTechRegistration($conn);

	$result = $register->register(ucwords($reg_lname), ucwords($reg_fname), $reg_email, $reg_pass, $contact);
	 // short if
 	$result && showAlertSuccess($result);
}
// ==========================

// admin registration
if (isset($_POST["btnAdminReg"])) {
	$reg_lname = $conn->escape_string($_POST["reg_lname"]);
	$reg_fname = $conn->escape_string($_POST["reg_fname"]);
	$reg_email = $conn->escape_string($_POST["reg_email"] . "@comappt.gov.ph");
	$reg_pass = $conn->escape_string($_POST["reg_pass"]);
	$contact = $conn->escape_string($_POST["contact"]);

	$register = new UserTechRegistration($conn);

	$result = $register->Adminregister(ucwords($reg_lname), ucwords($reg_fname), $reg_email, $reg_pass, $contact);
	 // short if
 	$result && showAlertSuccess($result);
}


// ===============================

// LOGIN
if (isset($_POST["btnLogin"])) {
 $emailLog = $conn->escape_string(trim($_POST["emailLog"] . "@comappt.gov.ph"));
 $passLog = $conn->escape_string(trim($_POST["passLog"]));

 $loginEmail = new UserLogin($conn);

 $result = $loginEmail->login($emailLog, $passLog);

 $result && showAlertLoginError($result);
}
// ===========================


// UPDATE ACCOUNTS
if (isset($_POST["btnUpdateAccount"])) {

$dataUpdate = new UpdateAccount($conn);

 $update_userId = $conn->escape_string(trim($_POST["update_userId"]));
 $update_lname = $conn->escape_string(trim($_POST["update_lname"]));
 $update_fname = $conn->escape_string(trim($_POST["update_fname"]));
 $update_email = $conn->escape_string(trim($_POST["update_email"] . "@comappt.gov.ph"));
 $contact = $conn->escape_string(trim($_POST["contact"]));
 $update_pass = $conn->escape_string(trim($_POST["update_pass"]));

 $result = $dataUpdate->update($update_userId, $update_lname, $update_fname, $update_email, $contact, $update_pass);
 // short if
   // $result && showAlertUpdateSuccess($result);

 // refresh the session values after update the accounts
 if ($result) {
 	$_SESSION["last_name"] = $update_lname;
 	$_SESSION["first_name"] = $update_fname;
 	$_SESSION["email"] = $update_email;
	showAlertUpdateSuccess($result); 	
 }
}
// =====================

// CHANGE USER PASSWORD
if (isset($_POST["btnChangePass"])) {
	$dataUpdate = new ChangeUserPassword($conn);
	if (isset($_POST["userId"])) {
	 $id = $conn->escape_string(trim($_POST["userId"]));
	 $change_pass = $conn->escape_string(trim($_POST["change_pass"]));
	 $result = $dataUpdate->change($id, $change_pass);
	 $result && showAlertSuccess($result);
	}
}
// ====================
?>