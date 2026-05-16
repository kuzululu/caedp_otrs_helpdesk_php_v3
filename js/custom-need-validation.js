// // Example starter JavaScript for disabling form submissions if there are invalid fields
// (() => {
//   'use strict'

//   // Fetch all the forms we want to apply custom Bootstrap validation styles to
//   const forms = document.querySelectorAll('.needs-validation')

//   // Loop over them and prevent submission
//   Array.from(forms).forEach(form => {
//     form.addEventListener('submit', event => {

//       //Get the input element
//       const contactInput = form.querySelector("input[name='contact']");

//       // check if the value is 0
//       if (contactInput) {
//         const value = contactInput.value;

//         if (value == 0) {
//           contactInput.setCustomValidity("Contact number cannot be 0");
//         }else if(value.includes("-")){
//           contactInput.setCustomValidity("Negative numbers are not allowed");
//         }else{
//           contactInput.setCustomValidity(""); //reset validation message
//         }
//       }

//       // if form is invalid, prevent submission
//       if (!form.checkValidity()) {
//         event.preventDefault()
//         event.stopPropagation()
//       }

//       form.classList.add('was-validated')
//     }, false)
//   })
// })()

// (() => {
//   'use strict'

//   const forms = document.querySelectorAll('.needs-validation')

//   Array.from(forms).forEach(form => {
//     form.addEventListener('submit', event => {

//       // Get the input element
//       const contactInput = form.querySelector("input[name='contact']");

//       if (contactInput) {
//         const value = contactInput.value;

//         // 👉 KUHANIN ang invalid-feedback
//         const feedback = contactInput
//           .closest('.input-group')
//           .querySelector('.invalid-feedback');

//         let message = "";

//         if (value == 0) {
//           message = "Contact number cannot be 0";
//         } 
//         else if (value.includes("-")) {
//           message = "Negative numbers are not allowed";
//         }

//         // 👉 SET validity
//         contactInput.setCustomValidity(message);

//         // 👉 I-SHOW sa HTML (.invalid-feedback)
//         if (feedback) {
//           feedback.textContent = message;
//         }
//       }

//       // if form is invalid, prevent submission
//       if (!form.checkValidity()) {
//         event.preventDefault()
//         event.stopPropagation()
//       }

//       form.classList.add('was-validated')
//     }, false)
//   })
// })()

(() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {

    const contactInput = form.querySelector("input[name='contact']");
    const feedback = contactInput
      ?.closest('.input-group')
      ?.querySelector('.invalid-feedback');

    // ✅ REAL-TIME VALIDATION (habang nagta-type)
    if (contactInput) {
      contactInput.addEventListener('input', () => {
        const value = contactInput.value;
        let message = "";

        if (value == 0) {
          message = "Contact number cannot be 0";
        } 
        else if (Number(value) < 0) {
          message = "Negative numbers are not allowed";
        }

        contactInput.setCustomValidity(message);

        if (feedback) {
          feedback.textContent = message;
        }

        form.classList.add('was-validated'); // update UI agad
      });
    }

    // ✅ SUBMIT VALIDATION
    form.addEventListener('submit', event => {

      if (contactInput) {
        const value = contactInput.value;
        let message = "";

        if (value == 0) {
          message = "Contact number cannot be 0";
        } 
        else if (Number(value) < 0) {
          message = "Negative numbers are not allowed";
        }

        contactInput.setCustomValidity(message);

        if (feedback) {
          feedback.textContent = message;
        }
      }

      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')

    }, false)

  })
})()