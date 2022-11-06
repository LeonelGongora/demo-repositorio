







    
    (function () {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')
    console.log(forms);

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {

          console.log(forms)
          console.log(form)
          console.log(event)
          
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            console.log(form);
          }
          form.classList.add('was-validated')
        }, false)
      })
  })()
    

