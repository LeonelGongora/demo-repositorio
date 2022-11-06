(function () {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')
    valores = Array.prototype.slice.call(forms)
    
    valores.forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
  })()