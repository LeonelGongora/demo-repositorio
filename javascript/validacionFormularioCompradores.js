
    (function () {

        let pattern1 = /^[A-Z|a-z|0-9|`|&|.|\s|!|-|,]{3,20}$/; 
        let pattern2 = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; 
        let pattern3 = /^\S[A-Z|a-z|0-9|&|$|@|-|%|*|#|,|.|;|+|/]{6,14}$/; 
        let pattern4 = /[7|6][0-9]{7}$/;
        let pattern5 = /https:\/\/goo.gl\/maps+\/\w+|https:\/\/maps.app.goo.gl\/\w+|/;
    
        var forms = document.querySelectorAll('.needs-validation')
    
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              var formulario = form.getElementsByTagName("input");
              var alertas = form.getElementsByClassName("invalid-feedback");
              console.log(formulario);
    
    
              if (!formulario[0].value.match(pattern1)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion1").innerText = "Ingrese un nombre valido";
                if(formulario[0].value == ""){
                  document.getElementById("validacion1").innerText = "Este campo es obligatorio";
      
                }
              }
    
              if (!formulario[1].value.match(pattern2)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion2").innerText = "Ingrese un email valido";
                if(formulario[1].value == ""){
                  document.getElementById("validacion2").innerText = "Este campo es obligatorio";
                }
              }
    
             if (formulario[2].value == "") {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion3").innerText = "Este campo es obligatorio";
              } else if (!formulario[2].value.match(pattern3)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion3").innerText = "Contraseña invalida";
              } else if (formulario[3].value != formulario[2].value){
                event.preventDefault()
                event.stopPropagation()
              }
    
              if (!formulario[4].value.match(pattern4)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion4").innerText = "El teléfono debe tener 8 digitos y comenzar con el 6 o el 7";
              
                if(formulario[4].value == ""){
                
                  document.getElementById("validacion4").innerText = "Este campo es obligatorio";
                  
                }
              }
    
              if (!formulario[5].value.match(pattern5)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion5").innerText = "Ingrese una ubicación valida";
                if(formulario[5].value == ""){
                
                  document.getElementById("validacion5").innerText = "Este campo es obligatorio";
      
                }
              }
    
              form.classList.add('was-validated')
    
            }, false)
          })
      })()
