

    (function () {

    let pattern1 = /^[A-Z|a-z|0-9|`|&|.|\s|!|-|,]{3,20}$/; 
    let pattern2 = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; 

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          var formulario = form.getElementsByTagName("input");
          var alertas = form.getElementsByClassName("invalid-feedback");
          console.log(alertas);

          if (!formulario[0].value.length == 0) {
            document.getElementById("validacion1").innerText = "Este campo es obligatorio";

            event.preventDefault()
            event.stopPropagation()
          }
          if (!formulario[1].value.match(pattern2)) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
  })()
    

