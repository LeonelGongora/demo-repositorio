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
    $_SESSION['pass1'] = $_POST['password'];

    $emailactual = $_SESSION['email1'];
    $passactual = $_SESSION['pass1'];

   $Name = $_POST['NombreNegocio']; 
   $password = $_POST['password'];
   $number = $_POST['Telefono'];
   $ubicacion = $_POST['Ubicacion'];

   $query = "UPDATE compradores SET NombreNegocio = '$Name', contrasenia = '$password',  Telefono = '$number', Ubicacion = '$ubicacion' WHERE compradores.Email = '$emailactual'";
   $resultado = $conn->query($query);

	$url= '../paginaPrincipalCompradores.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>