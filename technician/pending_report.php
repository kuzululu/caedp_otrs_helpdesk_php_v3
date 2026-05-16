<?php

include("../inc/config.php");
require_once "../inc/session.php";
include("../class/class.php");
include("../inc/connection.php");

$_SESSION["account_type"] == "technician" ? /* true condition */ : header("location: ../logout");

require_once "../inc/showAlert.php";

require_once "../controllers/controller.php";


// get the url request
$id = base64_decode($_GET["id"] ?? "");

// instantiate class
$get = new GetIncidentRecords($conn);

// retrieve record
$row = $get->retrieve($id);

?>

<?php require_once "template-parts/header.php"; ?>
<link rel="stylesheet" type="text/css" href="css/cssReport.css">
<script type="text/javascript" src="js/script.js"></script>

<!-- pass the session full name from php to print javascript -->
<script type="text/javascript">
  const technicianName = <?php echo json_encode($full_name); ?>;
</script>

<body>

<?php require_once "template-parts/navbar.php"; ?>

<section class="mt-5">
 <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
     <h2 class="fw-bolder fst-italic text-uppercase animate__animated animate__fadeIn animate__infinite infinite">Update Records</h2>
    </div>
  </div>  
 </div> 
</section>

<section>

  <div class="container-fluid">
    
  <div class="row">
   <div class="col-md-12 col-lg-12">
     
   <form class="row needs-validation" method="POST" novalidate="">
     
   <div class="col-6 mb-3">
     <label class="fw-bolder">Ticket ID</label>
     <div><?= htmlspecialchars($row["ticketId"]) ?></div>
     <input type="hidden" name="update_id" value="<?= htmlspecialchars($row['id']) ?>">
     <input type="hidden" required="" name="update_ticketId" value="<?= htmlspecialchars($row['ticketId']) ?>">
     <input type="hidden" name="update_techUserId" value="<?= $user_id ?>">
     <input type="hidden" required="" name="update_tech" value="<?= $row['technician'] ?>">
   </div>

   <div class="col-6 mb-3 text-end">
      <button type="submit" name="btnUpdatePending" class="mt-3 btn btn-outline-success btn-sm"><i class="fa-solid fa-underline"></i></button> <button type="button" class="btn btn-outline-primary btn-sm mt-3 btn-pendingPrintReport"><i class="fa-solid fa-print"></i></button> <a href="incident_records" class="btn btn-outline-danger btn-sm mt-3 text-decoration-none"><i class="fa-solid fa-door-open"></i></a>
   </div>

   <div class="col-md-3 mb-3">
     <label class="fw-bolder">Date Troubleshoot</label>
     <div class="input-group">
       <span class="input-group-text"><i class="fa fa-calendar"></i></span>
       <input type="text" name="update_datetroubleshoot" class="form-control datePicker" required="" value="<?= htmlspecialchars($row['date_troubleshoot']) ?>">
     </div>
   </div>

   <div class="col-md-3 mb-3">
     <label class="fw-bolder">Service</label>
     <div class="input-group">
       <span class="input-group-text"><i class="fa fa-users"></i></span>
       <select class="form-control" name="update_service" required="">
        <option value="<?= htmlspecialchars($row['services']) ?>"><?= htmlspecialchars($row['services']) ?></option>
        <option value="Accounting">Accounting</option>
        <option value="Aris">Aris</option>
        <option value="Budget">Budget</option>
        <option value="Cab">Cab</option>
        <option value="Cash">Cash</option>
        <option value="Cts">Cts</option>
        <option value="Coa">Coa</option>
        <option value="Dbls">Dbls</option>
        <option value="Gs">Gs</option>
        <option value="Hrms">Hrms</option>
        <option value="Irs">Irs</option>
        <option value="Legal">Legal</option>
        <option value="Odsa">Odsa</option>
        <option value="Odsla">Odsla</option>
        <option value="Odsear">Odsear</option>
        <option value="Odsiar">Odsiar</option>
        <option value="Osec">Osec</option>
        <option value="Osaa">Osaa</option>
        <option value="Saa">Saa</option>
        <option value="Tss">Tss</option>
       </select>
     </div>
   </div>

   <div class="col-md-3 mb-3">
     <label class="fw-bolder">End User</label>
     <div class="input-group">
       <span class="input-group-text"><i class="fa fa-user"></i></span>
       <input type="text" name="update_endUser" class="form-control" value="<?= htmlspecialchars($row['end_user']) ?>" required="">
     </div>
   </div>

   <div class="col-md-3 mb-3">
     <label class="fw-bolder">Unit Status</label>
     <div class="input-group">
       <span class="input-group-text"><i class="fa-regular fa-note-sticky"></i></span>
       <input type="text" name="update_unitStatus" value="<?= htmlspecialchars($row['unit_status']) ?>" class="form-control" required="">
     </div>
   </div>

   <div class="col-md-6 mb-3">
     <label class="fw-bolder">Problem</label>
     <div class="input-group">
      <textarea class="form-control" required="" rows="4" name="update_problem"><?= htmlspecialchars($row["problem"]) ?></textarea>
      <span class="input-group-text"><i class="fa-regular fa-note-sticky"></i></span>  
     </div>
   </div>

   <div class="col-md-6 mb-3">
     <label class="fw-bolder">Assessments</label>
     <div class="input-group">
      <textarea class="form-control" required="" rows="4" name="update_asessment"><?= htmlspecialchars($row["assessment"]) ?></textarea> 
      <span class="input-group-text"><i class="fa-regular fa-note-sticky"></i></span> 
     </div>
   </div>

   <div class="col-md-6 mb-3">
     <label>Remarks</label>
     <div class="row">
       <div class="col-md-12 mb-3">
         
        <div class="input-group">
         <span class="input-group-text"><i class="fa-brands fa-evernote"></i></span>
         <select class="form-control" name="update_remarks">
          <option value="<?= htmlspecialchars($row['remarks']) ?>"><?= htmlspecialchars($row['remarks']) ?></option>
          <option value="Problem Resolved/Repaired">Problem Resolved/Repaired</option>
          <option value="Hardware Replaced">Hardware Replaced</option>
          <option value="Software Installed/Reconfigured">Software Installed/Reconfigured</option>
          <option value="Replace Parts">Replace Parts</option>
          <option value="Escalated to Supplier">Escalated to Supplier</option>
          <option value="User Error/Training Provided">User Error/Training Provided</option>
          <option value="Could Not Reproduce Issue">Could Not Reproduce Issue</option>
          <option value="Network Troubleshoot">Network Troubleshoot</option>
          <option value="Unserviceable">Unserviceable</option>
          <option value="Others">Others</option>
         </select>
       </div>

       </div>
     </div>

     <div class="row">
       <div class="col-md-12 mb-3">
         <label class="fw-bolder">Specify</label>
         <textarea class="form-control" rows="4" name="update_remSpecify"><?= htmlspecialchars($row["remarks_specific"]) ?></textarea>
       </div>
     </div>

   </div>

   <div class="col-md-6 mb-3">
     <label>Status Report</label>
     <div class="row">
       <div class="col-md-12 mb-3">
         
        <div class="input-group">
         <span class="input-group-text"><i class="fa-brands fa-evernote"></i></span>
         <select class="form-control" name="update_statusReport">
          <option value="<?= htmlspecialchars($row['status_report']) ?>"><?= htmlspecialchars($row['status_report']) ?></option>
          <option value="Accomplished">Accomplished</option>
          <option value="Incident Report">Incident Report</option>
          <option value="Resolved">Resolved</option>
         </select>
       </div>

       </div>
     </div>

     <div class="row">
       <div class="col-md-12 mb-3">
         <label class="fw-bolder">Specify</label>
         <textarea class="form-control" rows="4" name="update_statsSpecify"><?= htmlspecialchars($row["stats_report_specify"]) ?></textarea>
       </div>
     </div>

   </div>

   </form> 

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

<div class="table-responsive" id="printPendingReport">

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
    <td colspan="3"><?= htmlspecialchars($row["unit_status"]) ?></td>
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
  <!-- SIGNATURE -->
  <tr>
    <th colspan="2" class="text-center signature-box">
      Prepared by:
    </th>

    <th colspan="2" class="text-center signature-box">
      Verified by:
    </th>
  </tr>

  <tr>
    <td colspan="2" class="text-center pt-5">
      <strong><?= htmlspecialchars($full_name) ?></strong><br>
      IT Technician
    </td>

    <td colspan="2" class="text-center pt-5">
      <strong>Juvy D. Balaoeg</strong><br>
      OIC-DBLS
    </td>
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