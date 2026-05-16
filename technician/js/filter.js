$(document).on("keyup", "#filterIncident", function(e){
 e.preventDefault();

 let filter = $(this).val();
 $.ajax({
  url: "../class/class.php",
  method: "POST",
  data:{
  	filterIncidentReport: filter
  },
  success: function(response){
  	$("#filterIncidentTable").html(response);
  	$("#pageNav").hide();
     $(".print").show();
     $(".printAll").hide();
  }	
 });	
})

$(document).on("keyup", "#filterComplete", function(e){
 e.preventDefault();

 let filter = $(this).val();
 $.ajax({
  url: "../class/class.php",
  method: "POST",
  data:{
  	filterCompleteReport: filter
  },
  success: function(response){
  	$("#CompleteRecords").html(response);
  	$("#pageNav").hide();
    $(".print").show();
    $(".printAll").hide();
  }	
 });	
});

$(document).on("keyup", "#filterPending", function(e){
  e.preventDefault();

  let filter = $(this).val();
  $.ajax({
  url: "../class/class.php",
  method: "POST",
  data:{
    filterPendingReport: filter
  },
  success: function(response){
    $("#PendingRecords").html(response);
    $("#pageNav").hide();
    $(".print").show();
    $(".printAll").hide();
  } 
 });  
});