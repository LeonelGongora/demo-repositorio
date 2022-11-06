<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/estiloFormularioVendedores.css">
    <title>Imperfect Food</title>
    
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       

       <div class="container-fluid" style="font-family:Helvetica;font-size: 18px">
          <img height="45px" alt="logo" src="imagenes/Logo-Barra.jpeg">

          <a class="navbar-brand" href="index.php">Imperfect Food</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <p style="opacity: 0;">Para rellenar</p>
          </div>
          
       </div>
    </nav>


  <section class="fondoVendedores">
    <div class = "container">
        
            <div class="row justify-content-center my-2" style="font-family:Arial;font-size: 16px">
              
                <form action="conexiones/registrarVendedores.php" method="post" enctype = "multipart/form-data" class="needs-validation" novalidate>
                    <div class="row justify-content-center my-1" style=" margin-top: 50px; border-radius: 10px; box-shadow: 10px 10px 10px -6px black; background-color:white;">
                        <div class="text-center" style="font-family:Arial;font-size: 18px">
                          <h2>Registro de Vendedores</h2>
                        </div class="alert alert-danger" role="alert">

                        <div class="col-lg-5">
                            
                          <div class="col">
                              <label for="NombreNegocio" class="form-label">Nombre de Negocio:</label>
                               <input type="text" name="NombreNegocio" id="NombreNegocio"class="form-control" pattern = "^[A-Z|a-z|0-9|`|&|.|\s|!|-|,]{3,20}$" required>
                             <div id = "validacion1" class="invalid-feedback">
                               Ingrese un nombre valido
                             </div>
                             
                          </div>
                          
                          <div class="col">
                              <label for="Email" class="form-label">Email: </label>
                             <input type="text" name="Email" id="Email" class="form-control" placeholder="example@gmail.com"  placeholder = "ejemplo@gmail.com" pattern = "^[^ ]+@[^ ]+\.[a-z]{2,3}$" required>
                              <div id = "validacion2" class="invalid-feedback">
                                Ingrese un email valido
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-10">
                                <label for="password" class="form-label">Contraseña:</label>
                                 <input name="password" type="password" class="form-control" id="password" aria-label="password" aria-describedby="basic-addon1" pattern = "^[A-Z|a-z|0-9|&|$|@|-|%|*|#|,|.|;|+|/]{6,14}$" required />
                                 <div id = "validacion3" class="invalid-feedback">
                                    La contraseña debe tener un minimo de 6 caracteres y maximo 14
                                  </div>
                            </div>
                            <div class="col-lg-2 my-2">
                                <div class="input-group-append my-4">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                      <i class="fas fa-eye" id="show_eye"></i>
                                      <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                          </div>
                          
                          <div class="col">
                              <label for="Telefono" class="form-label">Teléfono: </label>
                             <input type="text" name="Telefono" id="Telefono" class="form-control" pattern = "[7|6][0-9]{7}$" required></input>
                             <div id = "validacion4" class="invalid-feedback">
                                El telefono debe tener 8 digitos y comenzar con el 6 o el 7
                             </div>
                          </div>
                        
                          <div class="col">
                            <label for="Ubicacion" class="form-label">Ubicación: </label>
                            <input type="text" name="Ubicacion" id="Ubicacion" class="form-control" placeholder="https://goo.gl/maps/........." pattern = "https:\/\/goo.gl\/maps+\/\w+|https:\/\/maps.app.goo.gl\/\w+|" required>
                            <div id = "validacion5" class="invalid-feedback">
                              Ingrese una ubicacion valida
                            </div>
                          </div>
                        
                        
                          <div class="col">
                             <label for="Descripcion" class="form-label">Descripción: </label>
                             <input type="text" name="Descripcion" id="Descripcion" class = "form-control" pattern =  "^[A-Z|a-z|0-9|.|,|\s]{30,300}$"> 
                          </div>
                        </div>
                        
                          <style>
                            #output { 
                           position:relative; 
                           left:70px; 
                          } 
                          </style>
                          
                        <div class="col-lg-4 align-self-center">
    
                              <img  id="output" top= ""width="200px" height="200px"/>
                             <div style="opacity: 0;">
                                Textosasasa
                             </div>
                                
                          
                               <input type="file" name="ImagenVendedor" id="ImagenVendedor" accept="image/png, image/jpeg" class = "form-control" onchange="loadFile(event)"  required>
                               <div class="invalid-feedback">
                                   Necesita ingresar una imagen
                                </div>
                             
                            <script>
                            var loadFile = function(event) {
                              var output = document.getElementById('output');
                              output.src = URL.createObjectURL(event.target.files[0]);
                              output.onload = function() {
                                URL.revokeObjectURL(output.src) 
                              }
                            };
                            </script>
                          
                          
                        </div>
                        
                        <div class="d-flex justify-content-center flex-nowrap my-3">
                              <div >
                                  <a href="index.php" class="btn btn-danger rounded-0" role="button">Cancelar</a>
                              </div>
                              <div style="opacity: 0;">
                                Textosasasa
                              </div>
                              <div>
                                  <button type="submit" class="btn btn-success rounded-0">Registrar</button>
                              </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <br>
  </section>
    <script src="javascript/validacionFormularioVendedores.js"></script>
    <script src="javascript/paraElOjo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>
    
</body>
</html>