<?php

include("../inc/config.php");
require_once "../inc/session.php";
include("../class/class.php");
include("../inc/connection.php");

$_SESSION["account_type"] == "admin" ? /* true condition */ : header("location: ../logout");

require_once "../inc/showAlert.php";

require_once "../controllers/userController.php";

?>
<?php require_once "template-parts/header.php"; ?>
</head>
<body>

<?php 
 require_once "template-parts/navbar.php"; 
 require_once "modal/modal.php";
?>

<section class="mt-5">
 <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
     <h2 class="fw-bolder fst-italic text-uppercase animate__animated animate__fadeIn animate__infinite infinite">Accounts</h2>
    </div>
  </div>  
 </div> 
</section>

<section class="mt-3 mb-3">
 <div class="container-fluid">
  <div class="row">
  <div class="col-md-4 d-md-flex">
    <label class="mt-2">Filter:</label>
    <input type="search" id="filterAccount" class="form-control resetSearch"> <button class="resetBtn btn btn-secondary btn-sm" type="button">Reset</button>
  </div> 
</div> 
 </div> 
</section>

<section>
 <div class="container-fluid">
 <div class="row">
  <div class="col-md-12 col-lg-12 p-0">
  	
  <div class="table-resposive" id="shwTableAcct">
  	<table class="table table-hover table-condensed">
  	 <thead>
  	 	<tr class="text-center align-middle">
  	 		<th>No.</th>
  	 		<th>Last Name</th>
  	 		<th>First Name</th>
  	 		<th>Email</th>
  	 		<th>Contact</th>
  	 		<th>Actions</th>
  	 	</tr>
  	 </thead>
  	 <tbody>
<?php
 class ViewAccount{
  private $acct;

  public function __construct($acct){
    $this->acct = $acct;
  }

  public function displayAccount(){
  $ctr = 1;
  while ($row = $this->acct->fetch_assoc()) {
?>
    <tr class="text-center align-middle">
      <td><?= $ctr ?></td> 
      <td><?= htmlspecialchars($row["last_name"]) ?></td> 
      <td><?= htmlspecialchars($row["first_name"]) ?></td> 
      <td><?= htmlspecialchars($row["email"]) ?></td> 
      <td><?= htmlspecialchars($row["contact"]) ?></td> 
      <td><a id="<?= htmlspecialchars($row['user_id']) ?>" href="#" class="updatePass btn btn-outline-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modalChangePass"><i class="fa fa-underline"></i></a></td> 
    </tr>
<?php
$ctr++;
   }
  }
 }

$accountRecords = new UserAccount($conn);
$acct = $accountRecords->AdminRecords();

$accountView = new ViewAccount($acct);
$accountView->displayAccount();
?>
  	 </tbody>	
  	</table>
  </div>

   </div>
  </div>	
 </div>	
</section>

<?php require_once "template-parts/bottom.php"; ?>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/checkSessionStatus.js"></script>
</body>
</html>
