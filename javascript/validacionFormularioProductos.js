
    (function () {

        let pattern1 = /^[A-Z|a-z|0-9|`|&|.|\s|!|-|,]{3,20}$/; 
        let pattern2 = /^[1-9]$|^[1-9][0-9]{1,3}$|^[0-9]{1,3}[,]([0][1-9]|[1-9][0-9])$|^10000$/; //Precio
        let pattern3 = /^[1-9]$|^[1-9][0-9]{1,3}$|^[0-9]{1,3}[,]([0][1-9]|[1-9][0-9])$|^10000$/; 
        let pattern4 = /^([1-9][0-9]{0,3}|10000)$/; 
        let pattern5 = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; 

        var forms = document.querySelectorAll('.needs-validation')
    
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              var formulario = form.getElementsByTagName("input");
              var alertas = form.getElementsByClassName("invalid-feedback");
              console.log(alertas);
    
    
              if (!formulario[0].value.match(pattern1)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion1").innerText = "Ingrese un nombre de producto valido";
                if(formulario[0].value == ""){
                
                  document.getElementById("validacion1").innerText = "Este campo es obligatorio";
      
                }
              }
    
              if (!formulario[1].value.match(pattern2)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion2").innerText = "Ingrese un monto mayor a 0,00 y menor a 10000,00";

                if(formulario[1].value == ""){
                  document.getElementById("validacion2").innerText = "Este campo es obligatorio";
      
                }
              }
    
              if (!formulario[2].value.match(pattern3)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion3").innerText = "Ingrese un monto mayor a 0,00 y menor a 10000,00";
                if(formulario[2].value == ""){
                  document.getElementById("validacion3").innerText = "Este campo es obligatorio";
      
                }
              }
    
              if (!formulario[3].value.match(pattern4)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion4").innerText = "Ingrese un stock mayor a 0 y menor a 10 000";
              
                if(formulario[3].value == ""){
                
                  document.getElementById("validacion4").innerText = "Este campo es obligatorio";
                  
                }
              }
    
              form.classList.add('was-validated')
    
            }, false)
          })
      })()
        