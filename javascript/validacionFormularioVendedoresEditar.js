
    (function () {

        let pattern1 = /^[A-Z|a-z|0-9|`|&|.|\s|!|-|,]{3,20}$/; 
        let pattern2 = /^[A-Z|a-z|0-9|&|$|@|-|%|*|#|,|.|;|+|/]{6,14}$/; 
        let pattern3 = /[7|6][0-9]{7}$/;
        let pattern4 = /https:\/\/goo.gl\/maps+\/\w+|https:\/\/maps.app.goo.gl\/\w+|/;
    
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
                console.log("aaaaa");
                if(formulario[0].value == ""){
                  console.log("ssada");
                  document.getElementById("validacion1").innerText = "Este campo es obligatorio";
      
                }
              }
    
              
              if (!formulario[1].value.match(pattern2)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion2").innerText = "La contraseña debe tener un minimo de 6 caracteres y maximo 14";
                console.log("aaaaa");
                if(formulario[1].value == ""){
                
                  console.log("ssada");
                  document.getElementById("validacion2").innerText = "Este campo es obligatorio";
      
                }
              }
    
              if (!formulario[2].value.match(pattern3)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion3").innerText = "El telefono debe tener 8 digitos y comenzar con el 6 o el 7";
              
                if(formulario[2].value == ""){
                
                  document.getElementById("validacion3").innerText = "Este campo es obligatorio";
                  
                }
              }
    
              if (!formulario[3].value.match(pattern4)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion4").innerText = "Ingrese una ubicacion valida";
                if(formulario[3].value == ""){
                
                  document.getElementById("validacion4").innerText = "Este campo es obligatorio";
      
                }
              }

              if (formulario[5].files.length == 0) {
                event.preventDefault()
                event.stopPropagation()
              }
    
              form.classList.add('was-validated')
    
            }, false)
          })
      })()