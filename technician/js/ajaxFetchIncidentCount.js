"use strict";

// NORMAL JS LOAD AJAX
// let loadIncidentCount = () =>{
 
//  fetch("fetchIncidenCount.php")
//  .then(response => response.text())
//  .then(data =>{
//  	document.querySelector("#incidentCount").innerHTML = data;
//  });

// }

// // refresh every 3 seconds
// setInterval(loadIncidentCount, 3000);
// ===================================

// WITH SOUND NOTIFICATIONS
let oldCount = 0;

let notifSound = document.querySelector("#notifsound");

let loadIncidentCount = () =>{

	fetch("fetchIncidentCount.php")

	.then(response => response.text())

	.then(data =>{

		let newCount = parseInt(data) || 0;

		document.querySelector("#incidentCount").innerHTML = newCount;

		// detect new incident report
		if(newCount > oldCount){

			notifSound.play();

		}

		oldCount = newCount;

	});

}

// first load
loadIncidentCount();

// refresh every 3 seconds
setInterval(loadIncidentCount, 3000);

// ================================