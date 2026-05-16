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

<section class="mt-3" id="registration">
 <div class="container">
  
  <div class="row">
  	<div class="col-md-12 col-lg-12">
  	 <h2 class="text-center text-uppercase fst-italic">Admin Registration</h2>	
  	</div>
  </div>

  <div class="row">
  
  	<div class="col-md-2 col-lg-2"></div>
  
  	<div class="col-md-8 col-lg-8 p-5">
  	 
  	 <form class="row needs-validation" novalidate="" method="POST">
  	  
  	  <div class="col-md-6 mb-3">
  	  	<label class="fw-bolder">Last Name</label>
  	  	<div class="input-group">
  	  		<span class="input-group-text"><i class="fa fa-user"></i></span>
  	  		<input type="text" name="reg_lname" class="form-control" required="">
  	  		<small class="invalid-feedback">Pleaes Input Last Name</small>
  	  	</div>
  	  </div>

  	  <div class="col-md-6 mb-3">
  	  	<label class="fw-bolder">First Name</label>
  	  	<div class="input-group">
  	  		<span class="input-group-text"><i class="fa fa-user"></i></span>
  	  		<input type="text" name="reg_fname" class="form-control" required="">
  	  		<small class="invalid-feedback">Pleaes Input First Name</small>
  	  	</div>
  	  </div>

  	  <div class="col-md-6 mb-3">
  	  	<label class="fw-bolder">Email</label>
  	  	<div class="input-group">
  	  		<span class="input-group-text"><i class="fa fa-envelope"></i></span>
  	  		<input type="text" oninput="this.value = this.value.replace(/@/g, '').replace(/\.com/gi, '').replace(/\.gov/gi, '').replace(/\.ph/gi, '')" name="reg_email" class="form-control" required="">
  	  		<span class="input-group-text">@comappt.gov.ph</span>
  	  		<small class="invalid-feedback">Pleaes Input Email</small>
  	  	</div>
  	  </div>

  	  <div class="col-md-6 mb-3">
  	  	<label class="fw-bolder">Contact</label>
  	  	<div class="input-group">
  	  		<span class="input-group-text"><i class="fa fa-envelope"></i></span>
  	  		<input type="number" name="contact" value="0" class="form-control num" required="">
  	  		<small class="invalid-feedback">Pleaes Input Email</small>
  	  	</div>
  	  </div>

  	  <div class="col-md-6 mb-3">
  	  	<label class="fw-bolder">Password</label>
  	  	<div class="input-group">
  	  		<span class="input-group-text"><i class="fa fa-lock"></i></span>
  	  		<input type="password" name="reg_pass" class="form-control togglePassword" title="Please enter a password with at least one capital letter, one special character, and a minimum of 8 characters" required="" pattern="^(?=.*[A-Z]).{8,}$">
  	  		<span class="bg-danger bg-gradient input-group-text toggleIcon">
  	  				<i class="text-light fa fa-eye-slash d-none hide_eyes"></i>
									<i class="text-light fa fa-eye show_eyes"></i>
  	  		</span>
  	  		<small class="invalid-feedback">Pleaes Input Password</small>
  	  	</div>
  	  </div>

  	  <div class="col-md-6 mb-3">
  	  	<label class="fw-bolder">Confirm Password</label>
  	  	<div class="input-group">
  	  		<span class="input-group-text"><i class="fa fa-lock"></i></span>
  	  		<input type="password" name="reg_pass" class="form-control togglePassword" title="Please enter a password with at least one capital letter, one special character, and a minimum of 8 characters" required="" pattern="^(?=.*[A-Z]).{8,}$">
  	  		<span class="bg-danger bg-gradient input-group-text toggleIcon">
  	  				<i class="text-light fa fa-eye-slash d-none hide_eyes"></i>
									<i class="text-light fa fa-eye show_eyes"></i>
  	  		</span>
  	  		<small class="invalid-feedback">Pleaes Input Password</small>
  	  	</div>
  	  </div>

  	  <div class="col-md-12 text-end">
  	  	<a href="index" type="button" class="btn btn-outline-primary btn-sm">Back</a> <input type="submit" name="btnAdminReg" class="btn btn-outline-dark btn-sm" value="Register">
  	  </div>

  	 </form>

  	</div>
  
  	<div class="col-md-2 col-lg-2"></div>	
  
  </div>

 </div>	
</section>

<?php require_once "template-parts/bottom.php"; ?>
</body>
</html>