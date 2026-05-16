<div class="modal fade" id="modalFileUpload" data-bs-backdrop="static" data-bs-keyboard="false">
	
<div class="modal-dialog modal-dialog-scrollable">
 
<div class="modal-content">
	
 <div class="modal-header">
 	<h4 class="text-uppercase fst-italic fw-bolder">File Upload</h4>
	<button type="button" class="btn-close closed" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>

 <div class="modal-body">
 	
 <div class="col-md-12 mb-3">
 	<form class="row needs-validation" method="POST" novalidate="" enctype="multipart/form-data">
 	<input type="hidden" name="fileUploadId" id="fileUploadId">

 	<div class="col-md-12 mb-3">
 	 <label class="fst-italic fw-bolder">Upload File</label>
 	 <div class="input-group">
 	 	<span class="input-group-text"><i class="fa-regular fa-file"></i></span>
 	 	<input type="file" class="form-control" name="file_upload" accept="image/*">
 	 </div>	
 	</div>

 	<div class="col-md-12">
 		<input type="submit" class="btn btn-outline-primary btn-sm" name="btnUploadFile" value="Upload">
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