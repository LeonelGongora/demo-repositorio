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

   if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
   }

   $emailactual = $_POST['Email'];

    $consultaVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$emailactual'  LIMIT 1");
    if ($consultaVendedores->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $consultaCompradores = mysqli_query($conn,"SELECT * FROM compradores WHERE Email = '$emailactual' LIMIT 1");

    if ($$consultaCompradores->connect_errno) {
        printf("Coneccion fallida: %s\n", $mysqli->connect_error);
        exit();
    }

    if (mysqli_num_rows($consultaVendedores) > 0){
        $url = '../formularioVendedoresFallido.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }else if(mysqli_num_rows($consultaCompradores) > 0){
        $url= '../formularioVendedoresFallido.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }else{

        session_start();
       $_SESSION['email1'] = $_POST['Email'];
       $_SESSION['pass1'] = $_POST['password'];

       $Name = $_POST['NombreNegocio']; 
       $password = $_POST['password'];
       $email = $_POST['Email'];
       $number = $_POST['Telefono'];
       $ubicacion = $_POST['Ubicacion'];
       $descripcion = $_POST['Descripcion'];
       $imagen = addslashes(file_get_contents($_FILES['ImagenVendedor']['tmp_name']));

       $query = "INSERT INTO vendedores(NombreNegocio, contrasenia,  Email, Telefono, Ubicacion, Descripcion, ImagenVendedor) VALUES ('$Name', '$password', '$email', '$number', '$ubicacion', '$descripcion', '$imagen')";
       $resultado = $conn->query($query);

       if($resultado){
	     $url= '../paginaPrincipalVendedores.php';
         echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
       }else{
	      echo "La imagen no pudo insertarse";
       }
    } 
?>