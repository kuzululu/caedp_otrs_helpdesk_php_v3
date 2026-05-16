<div class="modal fade" id="modalChangePass" data-bs-backdrop="static" data-bs-keyboard="false">
	
<div class="modal-dialog modal-dialog-scrollable modal-lg">
 
<div class="modal-content">
	
 <div class="modal-header">
 	<h4 class="text-primary fw-bolder">Change Password</h4>
	<button type="button" class="btn-close closed" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>

 <div class="modal-body">

 <div class="col-md-12 mb-3">
 	<h4>Change Password for the account of <span id="fName" class="fw-bolder text-danger fst-italic"></span> <span id="lName" class="fw-bolder text-danger fst-italic"></span></h4>
 </div>
 	
 <div class="col-md-12 mb-3">
 	<form class="row needs-validation" method="POST" novalidate="">
 	<input type="hidden" name="userId" id="userId">

 	<div class="col-md-6 mb-3">
 	 <label class="fst-italic fw-bolder">Change Password</label>
 	 <div class="input-group">
 	 	<span class="input-group-text"><i class="fa fa-lock"></i></span>
 	 	<input type="text" id="change_pass" class="form-control" name="change_pass" required="">
 	 </div>	
 	</div>

 	<div class="col-md-12">
 		<input type="submit" class="btn btn-outline-primary btn-sm" name="btnChangePass" value="Change Password">
 	</div>

 </form>
 </div>
 
 </div>

</div>

</div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
	let modalClose = $(".closed");
	modalClose.on("click", function(){
		window.location.href = window.location.href;
	});	
});

</script>