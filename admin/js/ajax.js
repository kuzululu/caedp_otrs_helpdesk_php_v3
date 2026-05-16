$(document).on("click", ".updatePass", function(e){
 e.preventDefault();

 let id = $(this).attr("id");
	$.ajax({
		url: "retrieve.php",
		method: "POST",
		data:{
			changeId: id
		},
		dataType: "json",
		success: function(data){
			$("#userId").val(data.user_id);
			$("#fName").html(data.first_name);
			$("#lName").html(data.last_name);
		}
	});
});

$(document).on("keyup", "#filterAccount", function(e){
	e.preventDefault();

	let filter = $(this).val();
	$.ajax({
		url: "../class/class.php",
		method: "POST",
		data:{
			acctFilter: filter
		},
		success: function(response){
			$("#shwTableAcct").html(response);
		}
	});
});

$(document).on("keyup", "#filterRecords", function(e){
 e.preventDefault();

 let filter = $(this).val();
 $.ajax({
 	url: "../class/class.php",
 	method: "POST",
 	data:{
 		filterAdminRecords: filter
 	},
 	success: function(response){
 		$("#filterRecordsTable").html(response);
 		$("#pageNav").hide();
 		$(".print").show();
 		$(".printAll").hide();
 	}
 });	
});

$(document).on("keyup", "#filterHistoryRecords", function(e){
 e.preventDefault();

 let filter = $(this).val();
 $.ajax({
 	url: "../class/class.php",
 	method: "POST",
 	data:{
 		filterHistoryRecords: filter
 	},
 	success: function(response){
 	 $("#filterHistoryRecordsTable").html(response);
 	 $("#pageNav").hide();	
 	}
 });	
});