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

   $Name = $_POST['NombreNegocio']; 
   $password = $_POST['password'];
   $email = $_POST['Email'];
   $number = $_POST['Telefono'];
   $ubicacion = $_POST['Ubicacion'];
   $descripcion = $_POST['Descripcion'];
   $imagen = addslashes(file_get_contents($_FILES(['ImagenVendedor']['tmp_name'])));

   $query = "INSERT INTO vendedores(NombreNegocio, contrasenia,  Email, Telefono, Ubicacion, Descripcion, ImagenVendedor) VALUES ('$Name', '$password', '$email', '$number', '$ubicacion', '$descripcion', '$imagen')";
   $resultado = $conn->query($query);

   if($resultado){
	$url= 'paginaPrincipalVendedores.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
   }else{
	echo "No se inserto";
   }
	// Database connection
	
	/*
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {

		$stmt = $conn->prepare("insert into vendedores(NombreNegocio, password,  Email, Telefono, Ubicacion, Descripcion, ImagenVendedor) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssissb", $Name, $password , $email, $number, $ubicacion, $descripcion, $imagen);
		$execval = $stmt->execute();
		//echo $execval;
		//echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}


    */
?>
