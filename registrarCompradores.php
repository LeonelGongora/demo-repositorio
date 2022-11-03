<?php
	$Name = $_POST['NombreNegocio']; 
    $password = $_POST['password'];
    $email = $_POST['Email'];
	$number = $_POST['Telefono'];
    $ubicacion = $_POST['Ubicacion'];

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

	// Database connection
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into compradores(NombreNegocio, password,  Email, Telefono, Ubicacion) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $Name, $password , $email, $number, $ubicacion);
		$execval = $stmt->execute();
		//echo $execval;
		//echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

    $url= 'paginaPrincipalCompradores.php';
      echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';

?>