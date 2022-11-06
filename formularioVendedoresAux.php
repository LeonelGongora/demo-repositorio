<!DOCTYPE html
<!-- Code by CodeWithNepal - codewithnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/estiloVendedores.css">
  <title>Imperfect Food</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="paginaPrincipal.html">
          <strong>Imperfect food</strong></a>
        </div>
    </nav>
    <div class = "container">
        <div class="text-center">
            <h2>Registro de Vendedores</h2>
        </div class="alert alert-danger" role="alert">


        <div class="row justify-content-center my-5">
            <div class="col-lg-7">
                <form action="conexiones/registrarVendedores.php" method="post" enctype = "multipart/form-data">

                  <div class="col-md-8">
                    <div class="field name">
                      <div class="input-area">
                        <label for="NombreNegocio" class="form-label">Nombre de Negocio: </label>
                        <input type="text" name="NombreNegocio" id="NombreNegocio"  class="form-control" >
                      </div>
                      <div class="error error-txt">Este campo no puede estar vacio</div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="field email">
                      <div class="input-area">
                        <label for="Email" class="form-label">Email: </label>
                        <input type="text" name="Email" id="Email" class="form-control" >
                      </div>                   
                       <div class="error error-txt">Este campo no puede estar vacio</div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="field password">
                      <div class="input-area">
                        <label for="Password" class="form-label">Contraseña: </label>
                        <input type="text" name="Password" id="Password" class="form-control" >
                      </div>
                      <div class="error error-txt">Este campo no puede estar vacio</div>
                    </div>
                  </div>

                  
                  <div class="col-md-8">
                    <div class="field phone">
                      <div class="input-area">
                        <label for="Telefono" class="form-label">Telefono: </label>
                        <input type="text" name="Telefono" id="Telefono" class="form-control" >
                      </div>
                      <div class="error error-txt">Este campo no puede estar vacio</div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="field location">
                      <div class="input-area">
                        <label for="Ubicacion" class="form-label">Ubicacion: </label>
                        <input type="text" name="Ubicacion" id="Ubicacion" class="form-control" >
                      </div>
                      <div class="error error-txt">Este campo no puede estar vacio</div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="field description">
                    <div class="input-area">
                      <label for="Descripcion" class="form-label">Descripcion: </label>
                      <input type="text" name="Descripcion" id="Descripcion" class="form-control" >
                    </div>
                    <div class="error error-txt">Este campo no puede estar vacio</div>
                  </div>
                  </div>

                        
                          
                        <div class="col-lg-4 align-self-center">

                            <style>
                            #output { 
                                position:relative; 
                                left:70px; 
                            } 
                            </style>
    
                              <img  id="output" top= ""width="200px" height="200px"/>
                             <div style="opacity: 0;">
                                Textosasasa
                             </div>
                                
                          
                               <input type="file" name="ImagenVendedor" id="ImagenVendedor" accept="image/png, image/jpeg" class = "form-control" onchange="loadFile(event)"  required>
                               <div class="invalid-feedback">Necesita ingresar una imagen</div>
                             
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
                        
                            <div>
                                <a href="miPerfil.html" class="btn btn-danger" role="button">Cancelar</a>
                            </div>
                            <div style="opacity: 0;">
                                Textosasasa
                              </div>
                            <div>
                                <button type="submit" class="btn btn-success">Registrar</button>
                            </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
  <script src="javascript/validacionVendedores.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>
</body>
</html>