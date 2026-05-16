$(document).ready(function(){
$(".resetSearch").on("keyup", function(){
	let resetSearch = $(this).val();
	resetSearch == "" ? window.location.reload() : null;
});
});