<?php

include("../inc/config.php");
require_once "../inc/session.php";
include("../class/class.php");
include("../inc/connection.php");

$_SESSION["account_type"] == "technician" ? /* true condition */ : header("location: ../logout");

require_once "../inc/showAlert.php";

require_once "../controllers/userController.php";

// get the url request
$id = base64_decode($_GET["user_id"] ?? "");

// instantiate class
$get = new GetUserAccount($conn);

// retrieve the record
$row = $get->retrieve($id);

$email = str_replace("@comappt.gov.ph", "", $row["email"]); //remove @comappt.gov.ph after load

?>

<?php require_once "template-parts/header.php"; ?>
<script type="text/javascript" src="js/script.js"></script>
<body>

<?php require_once "template-parts/navbar.php"; ?>

<section class="mt-5">
 <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
     <h2 class="fw-bolder fst-italic text-uppercase animate__animated animate__fadeIn animate__infinite infinite">Update Account</h2>
    </div>
  </div>  
 </div> 
</section>

<section>

  <div class="container-fluid">
    
  <div class="row">
   <div class="col-md-12 col-lg-12">
     
   <form class="row needs-validation" method="POST" novalidate="">
   
    <div class="col-md-12">
      <input type="text" name="update_userId" class="d-none" value="<?= htmlspecialchars($row['user_id']) ?>">
    </div>

    <div class="col-md-4 mb-3">
        <label class="fw-bolder">Last Name</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
          <input type="text" name="update_lname" class="form-control" value="<?= htmlspecialchars($row['last_name']) ?>" required="">
          <small class="invalid-feedback">Pleaes Input Last Name</small>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <label class="fw-bolder">First Name</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
          <input type="text" name="update_fname" class="form-control" value="<?= htmlspecialchars($row['first_name']) ?>" required="">
          <small class="invalid-feedback">Pleaes Input First Name</small>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <label class="fw-bolder">Email</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
          <input type="text" value="<?= htmlspecialchars($email) ?>" oninput="this.value = this.value.replace(/@/g, '').replace(/\.com/gi, '').replace(/\.gov/gi, '').replace(/\.ph/gi, '')" name="update_email" class="form-control" required="">
          <span class="input-group-text">@comappt.gov.ph</span>
          <small class="invalid-feedback">Pleaes Input Email</small>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label class="fw-bolder">Contact</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
          <input type="number" name="contact" value="<?= htmlspecialchars($row['contact']) ?>" class="form-control num" required="">
          <small class="invalid-feedback">Pleaes Input Email</small>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label class="fw-bolder">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
          <input type="text" name="update_pass" class="form-control" title="Please enter a password with at least one capital letter, one special character, and a minimum of 8 characters"pattern="^(?=.*[A-Z]).{8,}$">
          <small class="invalid-feedback">Pleaes Input Password</small>
        </div>
      </div>

      <div class="col-md-12 text-end">
        <a href="index" type="button" class="btn btn-outline-primary btn-sm">Back</a> <input type="submit" name="btnUpdateAccount" class="btn btn-outline-dark btn-sm" value="Update">
      </div>

   </form> 

   </div>
  </div>

  </div> 
</section>

<?php require_once "template-parts/bottom.php"; ?>
<script type="text/javascript" src="js/checkSessionStatus.js"></script>
<script type="text/javascript" src="../js/togglePass.js"></script>
<!-- <script type="text/javascript" src="js/resetPage.js"></script> -->
<script type="text/javascript" src="../js/confirmPass.js"></script>

</body>
</html>