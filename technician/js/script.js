$(document).on("change", "#insert_remarks", function(){
 
 let remarks = $(this).val();

 if (remarks === "Others") {
  $("#insert_remSpecify").slideDown();
  $("textarea[name='insert_remSpecify']").prop("required",true).prop("disabled", false);
 }else{
  $("#insert_remSpecify").slideUp();
  $("textarea[name='insert_remSpecify']").prop("required",false).prop("disabled", true).val("");	
 }

});

$(document).on("change", "#insert_statusReport", function(){
 let status = $(this).val();

 if (status === "Incident Report") {
   $("#insert_statsSpecify").slideDown();
   $("textarea[name='insert_statsSpecify']").prop("required", true).prop("disabled", false);
 } else if(status === "Resolved"){
 	$("#insert_statsSpecify").slideDown();
   	$("textarea[name='insert_statsSpecify']").prop("required", true).prop("disabled", false);
 }else{
 	$("#insert_statsSpecify").slideUp();
   	$("textarea[name='insert_statsSpecify']").prop("required", false).prop("disabled", true).val("");
 }
});