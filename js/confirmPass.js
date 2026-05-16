"use strict";

document.addEventListener("DOMContentLoaded", ()=>{
 let form = document.querySelector("form");
 let passwordInput = document.querySelector("input[name='reg_pass']");
 let confirmInput = document.querySelectorAll(".togglePassword")[1];

 form.addEventListener("submit", (e)=>{
  if (passwordInput.value !== confirmInput.value) {
  	e.preventDefault();
  	 Swal.fire({
        icon: "error",
        position: 'top-end',
        title: "Password Mismatch",
        text: "The passwords you entered do not match.",
        confirmButtonText: "OK"
      });
  	confirmInput.focus();
  }
 });

});