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

session_start();

    $emailactual = $_SESSION['email1'];
    $passactual = $_SESSION['pass1'];

   $Name = $_POST['NombreNegocio']; 
   $password = $_POST['password'];
   $number = $_POST['Telefono'];
   $ubicacion = $_POST['Ubicacion'];
   $descripcion = $_POST['Descripcion'];
   $imagen = addslashes(file_get_contents($_FILES['ImagenVendedor']['tmp_name']));

   $query = mysqli_query($conn,"UPDATE vendedores SET NombreNegocio = '$Name', contrasenia = '$password',  Telefono = '$number', Ubicacion = '$ubicacion', Descripcion = '$descripcion', ImagenVendedor =  '$imagen' WHERE vendedores.Email = '$emailactual' and vendedores.contrasenia = '$passactual'");
   $resultado = $conn->query($query);

   
	$url= 'paginaPrincipalVendedores.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
   
?>