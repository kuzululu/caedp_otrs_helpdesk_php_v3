"use strict";

let btn = document.querySelector(".btn-print");

if (btn) {
 btn.addEventListener("click", (table_report) =>{
  let restorePage = document.body.innerHTML;
  let printArea = "";
  let printable = document.querySelector("#CompleteRecords").innerHTML;

  printArea += `<div class="container-fluid">
				  <div class="row">
				    <div class="col-12">
				      <img src='../img/logoCA.png' class='position-absolute img' width='120em' height='120em' />
				    </div>
				  </div>
				</div>`;

  printArea += `<div class="container-fluid mt-3 mb-5">
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
									      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Accomplished Records</h4>
									    </div>
					   </div>
					  </div>`;
  printArea += "<hr class='border border-dark'>";
  printArea += printable;

  // get the session php
  printArea += `<div class="container-fluid mt-4">
				  <div class="row">
				    <div class="col-12">
				      <div class='text-end fw-bolder fst-italic'>Technician: ${technicianName}</div>
				    </div>
				  </div>
				</div>`;

		// printArea += `<div class="container-fluid footerMsg">
		// 			   <div class="row">
		// 			    <div class='col-12 text-center'>
		// 			    <hr>
		// 								<h6 class='fw-bolder'>SECURITY ADVICE</h6>
		// 								<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
		// 							</div>
		// 			   </div>
		// 			  </div>`;

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

 }, false);
}

let btnIncidentReport = document.querySelector(".btn-incidentprint");

if (btnIncidentReport) {

 btnIncidentReport.addEventListener("click", (table_report) =>{
 	let restorePage = document.body.innerHTML;
  let printArea = "";
  let printable = document.querySelector("#filterIncidentTable").innerHTML;

  printArea += `<div class="container-fluid">
				  <div class="row">
				    <div class="col-12">
				      <img src='../img/logoCA.png' class='position-absolute img' width='120em' height='120em' />
				    </div>
				  </div>
				</div>`;

  printArea += `<div class="container-fluid mt-3 mb-5">
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
									      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Incident Records</h4>
									    </div>
					   </div>
					  </div>`;

  printArea += "<hr class='border border-dark'>";
  printArea += printable;

  // get the session php
  printArea += `<div class="container-fluid mt-4">
				  <div class="row">
				    <div class="col-12">
				      <div class='text-end fw-bolder fst-italic'>Technician: ${technicianName}</div>
				    </div>
				  </div>
				</div>`;

		 // printArea += `<div class="container-fluid footerMsg">
			// 		   <div class="row">
			// 		    <div class='col-12 text-center'>
			// 		    <hr>
			// 							<h6 class='fw-bolder'>SECURITY ADVICE</h6>
			// 							<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
			// 						</div>
			// 		   </div>
			// 		  </div>`;

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
 }, false);
}

let btnPrintPending = document.querySelector(".btn-printPending");

if (btnPrintPending) {
 
 btnPrintPending.addEventListener("click", (table_report)=>{
  	let restorePage = document.body.innerHTML;
  let printArea = "";
  let printable = document.querySelector("#PendingRecords").innerHTML;

  printArea += `<div class="container-fluid">
				  <div class="row">
				    <div class="col-12">
				      <img src='../img/logoCA.png' class='position-absolute img' width='120em' height='120em' />
				    </div>
				  </div>
				</div>`;

  printArea += `<div class="container-fluid mt-3 mb-5">
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
									      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Pending Records</h4>
									    </div>
					   </div>
					  </div>`;
		printArea += "<hr class='border border-dark'>";

  printArea += printable;

  // printArea += `<div class="container-fluid footerMsg">
		// 			   <div class="row">
		// 			    <div class='col-12 text-center'>
		// 			    <hr>
		// 								<h6 class='fw-bolder'>SECURITY ADVICE</h6>
		// 								<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
		// 							</div>
		// 			   </div>
		// 			  </div>`;

  // get the session php
  printArea += `<div class="container-fluid mt-4">
				  <div class="row">
				    <div class="col-12">
				      <div class='text-end fw-bolder fst-italic'>Technician: ${technicianName}</div>
				    </div>
				  </div>
				</div>`;

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

let allBtnCompletePrint = document.querySelector(".btn-printCompleteAll");

if (allBtnCompletePrint) {
  allBtnCompletePrint.addEventListener("click", (table_report)=>{
   let restorePage = document.body.innerHTML;
   let printArea = "";
   let printable = document.querySelector("#completPrintAllRecords").innerHTML;

   printArea += `
   	<div class="container-fluid">
	  <div class="row">
	    <div class="col-12">
	      <img src='../img/logoCA.png' class='position-absolute img' width='120em' height='120em' />
	    </div>
	  </div>
	</div>`;

printArea += `<div class="container-fluid mt-3 mb-5">
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
									      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Accomplished Records</h4>
									    </div>
					   </div>
					  </div>`;
	printArea += "<hr class='border border-dark'>";
	printArea += printable;

	 // get the session php
  printArea += `
	<div class="container-fluid mt-4">
	  <div class="row">
	    <div class="col-12">
	      <div class='text-end fw-bolder fst-italic'>Technician: ${technicianName}</div>
	    </div>
	  </div>
	</div>`;

	 // printArea += `<div class="container-fluid footerMsg">
		// 			   <div class="row">
		// 			    <div class='col-12 text-center'>
		// 			    <hr>
		// 								<h6 class='fw-bolder'>SECURITY ADVICE</h6>
		// 								<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
		// 							</div>
		// 			   </div>
		// 			  </div>`;
   
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

let allBtnIncident = document.querySelector(".btn-printIncidentAll");

if (allBtnIncident) {
  allBtnIncident.addEventListener("click", (table_report)=>{

   let restorePage = document.body.innerHTML;
   let printArea = "";
   let printable = document.querySelector("#incidentAllRecords").innerHTML;

   printArea += `
   	<div class="container-fluid">
	  <div class="row">
	    <div class="col-12">
	      <img src='../img/logoCA.png' class='position-absolute img' width='120em' height='120em' />
	    </div>
	  </div>
	</div>`;

   printArea += `<div class="container-fluid mt-3 mb-5">
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
									      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Incident Records</h4>
									    </div>
					   </div>
					  </div>`;
		
		printArea += "<hr class='border border-dark'>";

	printArea += printable;

	 // get the session php
  printArea += `
	<div class="container-fluid mt-4">
	  <div class="row">
	    <div class="col-12">
	      <div class='text-end fw-bolder fst-italic'>Technician: ${technicianName}</div>
	    </div>
	  </div>
	</div>`;

	// printArea += `<div class="container-fluid footerMsg">
	// 				   <div class="row">
	// 				    <div class='col-12 text-center'>
	// 				    <hr>
	// 									<h6 class='fw-bolder'>SECURITY ADVICE</h6>
	// 									<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
	// 								</div>
	// 				   </div>
	// 				  </div>`;
   
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

let allBtnPending = document.querySelector(".btn-printPendingAll");

if (allBtnPending) {
  allBtnPending.addEventListener("click", (table_report)=>{

  let restorePage = document.body.innerHTML;
   let printArea = "";
   let printable = document.querySelector("#pendingAllRecords").innerHTML;

   printArea += `
   	<div class="container-fluid">
	  <div class="row">
	    <div class="col-12">
	      <img src='../img/logoCA.png' class='position-absolute img' width='120em' height='120em' />
	    </div>
	  </div>
	</div>`;

   printArea += `<div class="container-fluid mt-3 mb-5">
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
									      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Pending Records</h4>
									    </div>
					   </div>
					  </div>`;
	printArea += "<hr class='border border-dark'>";

	printArea += printable;

	// printArea += `<div class="container-fluid footerMsg">
	// 				   <div class="row">
	// 				    <div class='col-12 text-center'>
	// 				    <hr>
	// 									<h6 class='fw-bolder'>SECURITY ADVICE</h6>
	// 									<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
	// 								</div>
	// 				   </div>
	// 				  </div>`;

	 // get the session php
  printArea += `
	<div class="container-fluid mt-4">
	  <div class="row">
	    <div class="col-12">
	      <div class='text-end fw-bolder fst-italic'>Technician: ${technicianName}</div>
	    </div>
	  </div>
	</div>`;
   
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

// ================================

// PRINT SPECIFIC REPORTS
let btnPrintCompleteReport = document.querySelector(".btn-printReport");

if (btnPrintCompleteReport) {
 btnPrintCompleteReport.addEventListener("click", (table_report)=>{
 	let restorePage = document.body.innerHTML;
   let printArea = "";
   let printable = document.querySelector("#printReport").innerHTML;

   printArea += `
   	<div class="container-fluid">
	  <div class="row">
	    <div class="col-12">
	      <img src='../img/logoCA.png' class='position-absolute imgReport' width='120em' height='120em' />
	    </div>
	  </div>
	</div>`;

 printArea += `<div class="container-fluid mt-3 mb-5">
				  <div class="row">
				    <div class="col-12">
				      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Commission On Appointments</h4>
				      <h5 class='text-center fw-bolder'>Republic of the Philippines</h5>
				    </div>
				  </div>
				</div>`;

	printArea += "<hr class='border border-dark'>";
	printArea += printable;

	// printArea += `<div class="container-fluid footerMsg">
	// 				   <div class="row">
	// 				    <div class='col-12 text-center'>
	// 				    <hr>
	// 									<h6 class='fw-bolder'>SECURITY ADVICE</h6>
	// 									<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
	// 								</div>
	// 				   </div>
	// 				  </div>`;

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

// ============================

// PENDING PRINT REPORTS
let btn_pendingReports = document.querySelector(".btn-pendingPrintReport");

if (btn_pendingReports) {
 btn_pendingReports.addEventListener("click", (table_report)=>{

  let restorePage = document.body.innerHTML;
   let printArea = "";
   let printable = document.querySelector("#printPendingReport").innerHTML;

   printArea += `
   	<div class="container-fluid">
	  <div class="row">
	    <div class="col-12">
	      <img src='../img/logoCA.png' class='position-absolute imgReport' width='120em' height='120em' />
	    </div>
	  </div>
	</div>`;

  
printArea += `<div class="container-fluid mt-3 mb-5">
				  <div class="row">
				    <div class="col-12">
				      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Commission On Appointments</h4>
				      <h5 class='text-center fw-bolder'>Republic of the Philippines</h5>
				    </div>
				  </div>
				</div>`;

	printArea += "<hr class='border border-dark'>";
	printArea += printable;

	// printArea += `<div class="container-fluid footerMsg">
	// 				   <div class="row">
	// 				    <div class='col-12 text-center'>
	// 				    <hr>
	// 									<h6 class='fw-bolder'>SECURITY ADVICE</h6>
	// 									<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
	// 								</div>
	// 				   </div>
	// 				  </div>`;
   
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

 }, false);
}

// =========================


// INCIDENT SPECIFIC REPORT PRINTING
let btnIncidentSpecific = document.querySelector(".btn-incidentPrintReport");

if (btnIncidentSpecific) {
 btnIncidentSpecific.addEventListener("click", (table_report)=>{
  let restorePage = document.body.innerHTML;
  let printArea = "";
  let printable = document.querySelector("#printIncidentReport").innerHTML;

  printArea += `
   	<div class="container-fluid">
	  <div class="row">
	    <div class="col-12">
	      <img src='../img/logoCA.png' class='position-absolute imgReport' width='120em' height='120em' />
	    </div>
	  </div>
	</div>`;

	printArea += `<div class="container-fluid mt-3 mb-5">
				  <div class="row">
				    <div class="col-12">
				      <h4 class='text-uppercase fst-italic fw-bolder text-center'>Commission On Appointments</h4>
				      <h5 class='text-center fw-bolder'>Republic of the Philippines</h5>
				    </div>
				  </div>
				</div>`;
				
	printArea += "<hr class='border border-dark'>";

	printArea += printable;

	// printArea += `<div class="container-fluid footerMsg">
	// 				   <div class="row">
	// 				    <div class='col-12 text-center'>
	// 				    <hr>
	// 									<h6 class='fw-bolder'>SECURITY ADVICE</h6>
	// 									<h6 class='fw-bolder fst-italic'>For Official Use Only. Unauthorized disclosure is strictly prohibited.</h6>
	// 								</div>
	// 				   </div>
	// 				  </div>`;

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

 }, false);
}
// ================================