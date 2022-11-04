
<?php
	

    //Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;

    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    $nombre = $_POST['NombreDeProducto']; 
    $precio = $_POST['Precio'];
    $precioOferta = $_POST['PrecioDeOferta'];
    $stock = $_POST['Stock'];
    $descripcion = $_POST['Descripcion'];
	$imagen = addslashes(file_get_contents($_FILES['ImagenProducto']['tmp_name']));

	$query = "INSERT INTO productos(NombreDeProducto, Precio, PrecioDeOferta, Stock, Descripcion, ImagenProducto) VALUES ('$nombre', '$precio', '$precioOferta', '$stock', '$descripcion', '$imagen')";
    $resultado = $conn->query($query);

    if($resultado){
	   $url= '../paginaPrincipalVendedores.php';
       echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }else{
	   echo "La imagen no pudo insertarse";
    }

	// Database connection
	/*
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into productos(NombreDeProducto, Precio, PrecioDeOferta, Stock, Descripcion) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $nombre, $precio , $precioOferta, $stock, $descripcion);
		$execval = $stmt->execute();
		//echo $execval;
		//echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
	*/
?>

