"use strict";
// single selector
// document.querySelector(".toggleIcon").addEventListener("click", ()=>{
//   let x = document.querySelector(".togglePassword");
//   let show_eye = document.querySelector(".show_eyes");
//   let hide_eye = document.querySelector(".hide_eyes");
//   hide_eye.classList.remove("d-none");
//   if (x.type === "password") {
//     x.type = "text";
//     show_eye.style.display = "none";
//     hide_eye.style.display = "block";
//   } else {
//     x.type = "password";
//     show_eye.style.display = "block";
//     hide_eye.style.display = "none";
//   }
// }, false);

// multiple selectors with same class name
document.querySelectorAll(".toggleIcon").forEach(icon=>{
 icon.addEventListener("click", ()=>{
  let group = icon.closest(".input-group");
  let input = group.querySelector(".togglePassword");
  let showEye = icon.querySelector(".show_eyes");
  let hideEye = icon.querySelector(".hide_eyes");

  let isPassword = input.type === "password";

  input.type = isPassword ? "text" : "password";

  showEye.classList.toggle("d-none", isPassword);
  hideEye.classList.toggle("d-none", !isPassword); 
 });
});