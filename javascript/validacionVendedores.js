const form = document.querySelector("form")

nField = form.querySelector(".name"),
nInput = nField.querySelector("input"),

eField = form.querySelector(".email"),
eInput = eField.querySelector("input"),

pField = form.querySelector(".password"),
pInput = pField.querySelector("input");

phField = form.querySelector(".phone"),
phInput = phField.querySelector("input");

loField = form.querySelector(".location"),
loInput = loField.querySelector("input");

deField = form.querySelector(".description"),
deInput = deField.querySelector("input");

form.onsubmit = (e)=>{
    
  e.preventDefault(); 
  (nInput.value == "") ? nField.classList.add("shake", "error") : checkName();
  (eInput.value == "") ? eField.classList.add("shake", "error") : checkEmail();
  (pInput.value == "") ? pField.classList.add("shake", "error") : checkPass();

  (phInput.value == "") ? phField.classList.add("shake", "error") : checkPhone();
  (loInput.value == "") ? loField.classList.add("shake", "error") : checkLocation();

  (deInput.value == "") ? deField.classList.add("shake", "error") : checkDescription();



  nInput.onkeyup = ()=>{checkName();}
  eInput.onkeyup = ()=>{checkEmail();} 
  pInput.onkeyup = ()=>{checkPass();} 

  phInput.onkeyup = ()=>{checkPhone();}
  loInput.onkeyup = ()=>{checkLocation();}
  deInput.onkeyup = ()=>{checkDescription();}
  
  function checkName(){ 
    let pattern = /^[A-Z|a-z|0-9|`|&|.|\s|!|-|,]{3,20}$/; 
    if(!nInput.value.match(pattern)){ 
      nField.classList.add("error");
      nField.classList.remove("valid");
      let errorTxt = nField.querySelector(".error-txt");
     
      (nInput.value != "") ? errorTxt.innerText = "Ingrese un nombre valido" : errorTxt.innerText = "Este campo no puede estar vacio";
    }else{ 
      nField.classList.remove("error");
      nField.classList.add("valid");
    }
  }

  function checkEmail(){ 
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; 
    if(!eInput.value.match(pattern)){ 
      eField.classList.add("error");
      eField.classList.remove("valid");
      let errorTxt = eField.querySelector(".error-txt");
      (eInput.value != "") ? errorTxt.innerText = "Ingrese un email valido" : errorTxt.innerText = "Este campo no puede estar vacio";
    }else{ 
      eField.classList.remove("error");
      eField.classList.add("valid");
    }
  }

  function checkPass(){ 
    let pattern = /^[A-Z|a-z|0-9]{6,14}$/; 
    if(!pInput.value.match(pattern)){ 
      pField.classList.add("error");
      pField.classList.remove("valid");
      let errorTxt = pField.querySelector(".error-txt");
      (pInput.value != "") ? errorTxt.innerText = "Ingrese una contraseña valida" : errorTxt.innerText = "Este campo no puede estar vacio";
    }else{ 
      pField.classList.remove("error");
      pField.classList.add("valid");
    }
  }

  function checkPhone(){ 
    let pattern = /[7|6][0-9]{7}$/;  
    if(!phInput.value.match(pattern)){ 
      phField.classList.add("error");
      phField.classList.remove("valid");
      let errorTxt = phField.querySelector(".error-txt");
      (phInput.value != "") ? errorTxt.innerText = "Ingrese un telefono valido" : errorTxt.innerText = "Este campo no puede estar vacio";
    }else{ 
      phField.classList.remove("error");
      phField.classList.add("valid");
    }
  }

  function checkLocation(){ 
    let pattern = /https:\/\/goo.gl\/maps+\/\w+/; 
    if(!loInput.value.match(pattern)){ 
      loField.classList.add("error");
      loField.classList.remove("valid");
      let errorTxt = loField.querySelector(".error-txt");
      (loInput.value != "") ? errorTxt.innerText = "Ingrese una ubicacion valida" : errorTxt.innerText = "Este campo no puede estar vacio";
    }else{ 
      loField.classList.remove("error");
      loField.classList.add("valid");
    }
  }

  function checkDescription(){ 
    let pattern = /^[A-Z|a-z|0-9|.|,|\s]{30,300}$/ ; 
    if(!deInput.value.match(pattern)){ 
      deField.classList.add("error");
      deField.classList.remove("valid");
      let errorTxt = deField.querySelector(".error-txt");
      (deInput.value != "") ? errorTxt.innerText = "Ingrese una descripcion valida" : errorTxt.innerText = "Este campo no puede estar vacio";
    }else{ 
       deField.classList.remove("error");
       deField.classList.add("valid");
    }
  }

  if(!nField.classList.contains("error") && !eField.classList.contains("error")
     && !pField.classList.contains("error") && !phField.classList.contains("error") 
     && !loField.classList.contains("error") && !deField.classList.contains("error")){
      
    window.location.href = form.getAttribute("action"); 
  }
};

