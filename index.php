<?php

session_status() === PHP_SESSION_NONE && session_start();

// Mas readable alternative sa if else arrayMapping (slightly longer but clearer)
if (isset($_SESSION["user_id"])) {
  $roleMap = [
   "technician" => "technician",
   "admin" => "admin",
  ];

  if (isset($roleMap[$_SESSION["account_type"]])) {
    header("location: " . $roleMap[$_SESSION["account_type"]]);
    exit();
  }
}

require_once "inc/config.php";
include("class/class.php");
require_once "inc/connection.php";
require_once "inc/showAlert.php";

require_once "controllers/userController.php";

?>

<?php require_once "template-parts/header.php"; ?>
<body>

<section>
 <div class="container">
 	
  <div class="row">
<!-- <div class="col-md-4 col-lg-4"></div> -->
 <div class="col-md-6 col-lg-6 mb-3">
 	 <div class="mt-md-5 pt-md-5">
 	  <center><img src="img/logoCA.png" class="animate__animated animate__fadeIn animate__infinite infinite img-fluid d-md-block d-lg-block d-none
      " height="320" width="320"></center>
       <center><img src="img/logoCA.png" class="animate__animated animate__fadeIn animate__infinite infinite img-fluid d-md-none d-lg-none d-block
      " height="130" width="130"></center>
 	 </div>
 </div>	

<div class="col-md-6 col-lg-6 ps-md-5 pe-md-5 pt-md-3 pb-md-3" id="loginSection">
<div class="mt-md-3 pt-md-3"></div>
<form class="row needs-validation mt-md-5 pt-md-5" method="POST" novalidate="">

<div class="col-md-3 text-center">
 <h3 class="text-success fw-bolder text-uppercase animate__animated animate__bounce animate__infinite	infinite">Login</h3>	
</div>

<div class="col-md-9 text-center">
  <h3 class="text-uppercase fst-italic fw-bolder">caedp otrs helpdesk</h3>
  <small class="text-danger fw-bolder fst-italic">Open Ticket Request System</small>
</div>

<div class="col-md-12 mb-3">
	<label class="fw-bolder">Email:</label>
	<div class="input-group">
		<span class="bg-info bg-gradient input-group-text"><i class="text-light fa fa-user"></i></span>
		<input type="text" name="emailLog" class="form-control" oninput="this.value = this.value.replace(/@/g, '').replace(/\.com/gi, '').replace(/\.gov/gi, '').replace(/\.ph/gi, '')" required="" autofocus="">
		<span class="input-group-text">@comappt.gov.ph</span>
</div>
</div>

<div class="col-md-12 mb-3">
<label class="fw-bolder">Password:</label>
<div class="input-group">
	<span class="bg-info bg-gradient input-group-text"><i class="text-light fa fa-lock"></i></span>
		<input type="password" name="passLog" class="form-control togglePassword" required="">
		<span class="bg-danger bg-gradient input-group-text toggleIcon">
		<i class="text-light fa fa-eye-slash d-none hide_eyes"></i>
		<i class="text-light fa fa-eye show_eyes"></i>
</span>
</div>
</div>

<div class="col-md-12 text-end mb-3">
<input type="submit" class="btn btn-primary btn-sm" value="Login" name="btnLogin"> 
<div class="text-center">
	<small class="text-center fw-bolder">No Account click <a href="register" class="animated fadeIn infinite text-primary">here</a> to Register</small>
</div>
</div>

</form>
</div>
</div>

 </div>	
</section>

<?php require_once "template-parts/bottom.php"; ?>
</body>
</html>