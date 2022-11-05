
<?php

    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


if(!$conn){
  echo "error de conexion";
  exit;
}

$result = mysqli_query($conn,"SELECT NombreDeProducto,Precio,PrecioDeOferta,Stock,Descripcion, ImagenProducto FROM productos ");
if(!$result){
  echo "ocurrio un error";
  exit;
}

for($i = 0; $resultado[$i] = mysqli_fetch_assoc($result); $i++) ;
// Delete last empty one
array_pop($resultado);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperfect Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <img height="45px" alt="logo" src="imagenes/Logo-Barra.jpeg">
       <div class="container-fluid" style="font-family:Helvetica;font-size: 18px">
        <a class="navbar-brand" href="index.php">Imperfect Food</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Registrarse
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="formularioVendedores.php">Vendedor</a></li>
                    <li><a class="dropdown-item" href="formularioCompradores.php">Comprador</a></li>
                  </ul>
                </li>
                <a class="nav-link" href="login.php">
                  Iniciar Sesión
                </a>
              </ul>
            </div>
        </div>
      </nav>
 
      <div class="container my-4">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
            <?php if (is_array($resultado) || is_object($resultado)): foreach($resultado as $row){ ?> 
              <div class="col">
                <div class="card shadow-sm border-danger">
                  <div class="row justify-content-center ">
                    <div class="col">
                      <div class="card mb-1 border-0" >
                        <div class="card-body text-center" >
                          <img src="data:image/jpg;base64,<?php echo base64_encode($row['ImagenProducto']);?>"  width="180" height="180"> 
                          
                            <div class="text-center">
                               <h5> <?php echo $row['NombreDeProducto'];?> </h5>
                            </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card-body">
                        <div class="card mb-4 border-0 text-white bg-danger text-center rounded" >
                          <div class="card-body "> 
                              Oferta: <?php echo $row['PrecioDeOferta'];?> Bs.
                          </div>
                        </div >
                          <h6 class="card-text">Precio Normal: <del><?php echo $row['Precio'];?></del> Bs.</h6>
                          <h6 class="card-text">Stock: <?php echo $row['Stock'];?></h6>
                          <p> <?php echo $row['Descripcion'];?> </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } endif;?>
          </div>
      </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
      crossorigin="anonymous"></script>

</body>
</html>