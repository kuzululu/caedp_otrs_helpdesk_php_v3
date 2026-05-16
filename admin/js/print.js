"use strict";

let btnPrintAllRecords = document.querySelector(".btn-printAllRecords");

if (btnPrintAllRecords) {

btnPrintAllRecords.addEventListener("click", (table_report)=>{
let restorePage = document.body.innerHTML;
let printArea = "";
let printable = document.querySelector("#AllAdminRecords").innerHTML;

printArea += `<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <img src='../img/logoCA.png' class='position-absolute img' width='120em' height='120em' />
    </div>
  </div>
</div>`;

printArea += `<div class="container-fluid mt-3 mb-4">
  <div class="row">
    <div class="col-12">
      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Commission On Appointments</h4>
      <h5 class='text-center fw-bolder'>Republic of the Philippines</h5>
    </div>
  </div>
</div>`;

printArea += `<div class="container-fluid">
	   <div class="row">
	    <div class='col-12'>
	      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Records</h4>
	    </div>
	   </div>
	  </div>`;
printArea += "<hr class='border border-dark'>";

printArea += printable;

// printArea += `<div class="footerMsg">
//    <div class="row">
//     <div class='col-12 text-center'>
//     <hr>
// 		<h6 class='fw-bolder'>SECURITY ADVICE</h6>
// 		<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
// 	</div>
//    </div>
//   </div>`;

document.body.innerHTML = printArea;

// normal window print
// document.body.innerHTML = printArea;
// window.print();

// document.body.innerHTML = restorePage;
// window.location.href = window.location.href;
// ============================================

// fixed logo or picture in window print not loaded in first visit page
let logo = new Image();
logo.src = `../img/logoCA.png`;
logo.onload = () =>{
	setTimeout(()=>{
		window.print();
		document.body.innerHTML = restorePage;
		window.location.href = window.location.href;
	},100);
}

},false);
}

// ===================================

let btnprintRecords = document.querySelector(".btn-printRecords");

if (btnprintRecords) {
 
 btnprintRecords.addEventListener("click", (table_report)=>{
 	let restorePage = document.body.innerHTML;
		let printArea = "";
		let printable = document.querySelector("#filterRecordsTable").innerHTML;

printArea += `<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <img src='../img/logoCA.png' class='position-absolute img' width='120em' height='120em' />
    </div>
  </div>
</div>`;

printArea += `<div class="container-fluid mt-3 mb-4">
  <div class="row">
    <div class="col-12">
      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Commission On Appointments</h4>
      <h5 class='text-center fw-bolder'>Republic of the Philippines</h5>
    </div>
  </div>
</div>`;

printArea += `<div class="container-fluid">
	   <div class="row">
	    <div class='col-12'>
	      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Records</h4>
	    </div>
	   </div>
	  </div>`;
printArea += "<hr class='border border-dark'>";

printArea += printable;

document.body.innerHTML = printArea;

// fixed logo or picture in window print not loaded in first visit page
let logo = new Image();
logo.src = `../img/logoCA.png`;
logo.onload = () =>{
	setTimeout(()=>{
		window.print();
		document.body.innerHTML = restorePage;
		window.location.href = window.location.href;
	},100);
}

 },false);
}

let btnprintReportDetails = document.querySelector(".btn-printReportDetails");

if (btnprintReportDetails) {
 btnprintReportDetails.addEventListener("click", (table_report)=>{
 	let restorePage = document.body.innerHTML;
		let printArea = "";
		let printable = document.querySelector("#printReportDetailsTable").innerHTML;

		printArea += `<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <img src='../img/logoCA.png' class='position-absolute imgReport' width='120em' height='120em' />
    </div>
  </div>
</div>`;

printArea += `<div class="container-fluid mt-3 mb-4">
  <div class="row">
    <div class="col-12">
      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Commission On Appointments</h4>
      <h5 class='text-center fw-bolder'>Republic of the Philippines</h5>
    </div>
  </div>
</div>`;

printArea += `<div class="container-fluid">
	   <div class="row">
	    <div class='col-12'>
	      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Report</h4>
	    </div>
	   </div>
	  </div>`;
printArea += "<hr class='border border-dark'>";

printArea += printable;

document.body.innerHTML = printArea;

// fixed logo or picture in window print not loaded in first visit page
let logo = new Image();
logo.src = `../img/logoCA.png`;
logo.onload = () =>{
	setTimeout(()=>{
		window.print();
		document.body.innerHTML = restorePage;
		window.location.href = window.location.href;
	},100);
}
 },false);
}