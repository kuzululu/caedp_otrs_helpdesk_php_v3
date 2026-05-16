<?php

include("../inc/config.php");
require_once "../inc/session.php";
include("../class/class.php");
include("../inc/connection.php");

$_SESSION["account_type"] == "admin" ? /* true condition */ : header("location: ../logout");

// get the url request
$id = base64_decode($_GET["id"] ?? "");

// instantiate class
$get = new GetDetailRecords($conn);

// retrieve record
$row = $get->retrieve($id);

?>
<?php require_once "template-parts/header.php"; ?>
<link rel="stylesheet" type="text/css" href="css/cssReport.css">
<script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>

<?php require_once "template-parts/navbar.php"; ?>

<section class="mt-5">
 <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
     <h2 class="fw-bolder fst-italic text-uppercase animate__animated animate__fadeIn animate__infinite infinite">Records</h2>
    </div>
  </div>  
 </div> 
</section>

<section>

  <div class="container-fluid">
    
  <div class="row">
   <div class="col-md-12 col-lg-12">
     
   <div class="row">
    
   <div class="col-md-12 text-end">
    <button type="button" class="btn btn-outline-primary btn-sm btn-printReportDetails"><i class="fa-solid fa-print"></i></button>
    <a href="index" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-door-open"></i></a>
   </div>

   <div class="col-6 mb-3">
     <label class="fw-bolder">Ticket ID</label>
     <div class="form-control"><?= htmlspecialchars($row["ticketId"]) ?></div>
   </div>

   <div class="col-md-6 mb-3">
     <label class="fw-bolder">Date Troubleshoot</label>
     <div class="input-group">
       <span class="input-group-text"><i class="fa fa-calendar"></i></span>
       <input type="text" name="update_datetroubleshoot" class="form-control datePicker" required="" value="<?= htmlspecialchars($row['date_troubleshoot']) ?>">
     </div>
   </div>

   <div class="col-md-6 mb-3">
     <label class="fw-bolder">Service</label>
     <div class="input-group">
       <span class="input-group-text"><i class="fa fa-users"></i></span>
        <div class="form-control"><?= htmlspecialchars($row['services']) ?></div>
     </div>
   </div>

   <div class="col-md-6 mb-3">
     <label class="fw-bolder">End User</label>
     <div class="input-group">
       <span class="input-group-text"><i class="fa fa-user"></i></span>
       <div class="form-control"><?= htmlspecialchars($row['end_user']) ?></div>
     </div>
   </div>

   <div class="col-md-12 mb-3">
     <label class="fw-bolder">Unit Status</label>
     <div class="input-group">
       <span class="input-group-text"><i class="fa-regular fa-note-sticky"></i></span>
       <div class="form-control"><?= htmlspecialchars($row['unit_status']) ?></div>
     </div>
   </div>

   <div class="col-md-6 mb-3">
     <label class="fw-bolder">Problem</label>
     <div class="input-group">
      <textarea class="form-control" disabled="" required="" rows="4" name="update_problem"><?= htmlspecialchars($row["problem"]) ?></textarea>
      <span class="input-group-text"><i class="fa-regular fa-note-sticky"></i></span>  
     </div>
   </div>

   <div class="col-md-6 mb-3">
     <label class="fw-bolder">Assessments</label>
     <div class="input-group">
      <textarea class="form-control"  disabled="" required="" rows="4" name="update_asessment"><?= htmlspecialchars($row["assessment"]) ?></textarea> 
      <span class="input-group-text"><i class="fa-regular fa-note-sticky"></i></span> 
     </div>
   </div>

   <div class="col-md-6 mb-3">
     <label>Remarks</label>
     <div class="row">
       <div class="col-md-12 mb-3">
         
        <div class="input-group">
         <span class="input-group-text"><i class="fa-brands fa-evernote"></i></span>
         <div class="form-control"><?= htmlspecialchars($row["remarks"]) ?></div>
       </div>

       </div>
     </div>

     <div class="row">
       <div class="col-md-12 mb-3">
         <label class="fw-bolder">Specify</label>
         <textarea class="form-control" disabled="" rows="4" name="update_remSpecify"><?= htmlspecialchars($row["remarks_specific"]) ?></textarea>
       </div>
     </div>

   </div>

   <div class="col-md-6 mb-3">
     <label>Status Report</label>
     <div class="row">
       <div class="col-md-12 mb-3">
         
        <div class="input-group">
         <span class="input-group-text"><i class="fa-brands fa-evernote"></i></span>
         <div class="form-control"><?= htmlspecialchars($row["status_report"]) ?></div>
       </div>

       </div>
     </div>

     <div class="row">
       <div class="col-md-12 mb-3">
         <label class="fw-bolder">Specify</label>
         <textarea class="form-control" disabled="" rows="4" name="update_statsSpecify"><?= htmlspecialchars($row["stats_report_specify"]) ?></textarea>
       </div>
     </div>

   </div>

   </div> 

   </div>
  </div>

  </div> 
</section>



<!-- SECTION TABLE HIDDEN ELEMENT FOR PRINTING -->
<!-- PRINT REPORT DESIGN -->
<section class="d-none">
 <div class="container-fluid">
  <div class="row">
   <div class="col-12">

<div class="table-responsive" id="printReportDetailsTable">

<table id="reportDesign">

  <colgroup>
    <col style="width:15%;">
    <col style="width:35%;">
    <col style="width:15%;">
    <col style="width:35%;">
  </colgroup>

  <tr>
    <th>Ticket ID:</th>
    <td><?= htmlspecialchars($row["ticketId"]) ?></td>

    <th>Date Troubleshoot:</th>
    <td><?= htmlspecialchars($row["date_troubleshoot"]) ?></td>
  </tr>

  <tr>
    <th>Service:</th>
    <td><?= htmlspecialchars($row["services"]) ?></td>

    <th>End User:</th>
    <td><?= htmlspecialchars($row["end_user"]) ?></td>
  </tr>

  <tr>
    <th>Unit Status:</th>
    <td><?= htmlspecialchars($row["unit_status"]) ?></td>

    <th>IT Technician:</th>
    <td><?= htmlspecialchars($row["technician"]) ?></td>
  </tr>

  <!-- PROBLEM -->
  <tr>
    <th colspan="4" class="section-title">
      PROBLEM REPORTED
    </th>
  </tr>

  <tr>
    <td colspan="4" class="text-area">
      <?= htmlspecialchars($row["problem"]) ?>
    </td>
  </tr>

  <!-- ASSESSMENT -->
  <tr>
    <th colspan="4" class="section-title">
      ASSESSMENT / ACTION TAKEN
    </th>
  </tr>

  <tr>
    <?php
     if ($row["assessment"] == "") { ?>
     <td colspan="4" class="text-area fw-bolder fst-italic">****PENDING****</td>  
   <?php }else{ ?>
      <td colspan="4" class="text-area">
        <?= htmlspecialchars($row["assessment"]) ?>
      </td>
   <?php  }
    ?>
  </tr>

  <!-- REMARKS -->
  <tr>
    <th>Remarks:</th>
    <?php
     if ($row["remarks"] == "") { ?>
     <td colspan="3" class="text-area fw-bolder fst-italic">****PENDING****</td>  
   <?php }else{ ?>
      <td colspan="3" class="text-area">
        <?= htmlspecialchars($row["remarks"]) ?>
      </td>
   <?php  }
    ?>
  </tr>

  <tr>
    <th colspan="4">Remarks Specify:</th>
  </tr>

  <tr>
    <?php
     if ($row["remarks_specific"] == "") { ?>
     <td colspan="4" class="text-area fw-bolder fst-italic">****NOTHING FOLLOWS****</td>  
   <?php }else{ ?>
      <td colspan="4" class="text-area">
        <?= htmlspecialchars($row["remarks_specific"]) ?>
      </td>
   <?php  }
    ?>
  </tr>

  <!-- STATUS -->
  <tr>
    <th>Status Report:</th>
    <?php
    if ($row["status_report"] == "") { 
    ?>
     <td colspan="3" class="fw-bolder fst-italic">****PENDING****</td> 
   <?php
      }else{ 
    ?>
    <td colspan="3">
      <?= htmlspecialchars($row["status_report"]) ?>
    </td>
   <?php 
      }
    ?>
  </tr>

  <tr>
    <th colspan="4">Status Specify:</th>
  </tr>

  <tr>
  <?php
    if ($row["stats_report_specify"] == "") { ?>
     <td colspan="4" class="text-area fw-bolder fst-italic">****NOTHING FOLLOWS****</td> 
   <?php }else{ ?>
    <td colspan="4" class="text-area"><?= htmlspecialchars($row["stats_report_specify"]) ?></td>
   <?php }
    ?>
  </tr>

</table>

</div>

   </div>
  </div>
 </div>
</section>

<?php require_once "template-parts/bottom.php"; ?>
<script type="text/javascript" src="js/checkSessionStatus.js"></script>
</body>
</html>
