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

   $emailactual = $_POST['Email'];

    $consultaVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$emailactual'  LIMIT 1");
    $consultaCompradores = mysqli_query($conn,"SELECT * FROM compradores WHERE Email = '$emailactual' LIMIT 1");

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
       $insertar = $conn->query($query);

       $last_id = $conn->insert_id;
       echo "New record created successfully. Last inserted ID is: " . $last_id;

       $_SESSION['idUsuario'] = $last_id;
       echo $_SESSION['idUsuario'];

       /* if($insertar){
        $result = mysqli_query($conn,"SELECT id, NombreNegocio, contrasenia, Email, Telefono, Ubicacion, Descripcion, ImagenVendedor FROM vendedores WHERE vendedores.Email = '$ema' AND vendedores.contrasenia = '$pas' LIMIT 1"); 
        if(!$result){
            echo "ocurrio un error";
            exit;
        }
        for($i = 0; $resultado[$i] = mysqli_fetch_assoc($result); $i++) ;
        // Delete last empty one
        array_pop($resultado); 
        if (is_array($resultado) || is_object($resultado)): {foreach($resultado as $row): 

            echo base64_encode($row['id']);

        endforeach;} endif;

        $_SESSION['idUsuario'] = base64_encode($row['id']);
        echo $_SESSION['idUsuario'];


     

        //$url= '../paginaPrincipalVendedores.php';
        //echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
       }else{
        echo "La imagen no pudo insertarse";
       } */
    } 
?>