$(document).on("click", ".uploadFile", function(e){
 e.preventDefault();

 let id = $(this).attr("id");
 $.ajax({
 	url: "retrieve.php",
 	method: "POST",
 	data:{
 		uploadFileData: id
 	},
 	dataType: "json",
 	success: function(data){
     $("#fileUploadId").val(data.id);
 	} 
 });
});