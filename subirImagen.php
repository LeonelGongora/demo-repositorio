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
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        $Name = $_POST['NombreNegocio']; 
    $password = $_POST['password'];
    $email = $_POST['Email'];
	$number = $_POST['Telefono'];
    $ubicacion = $_POST['Ubicacion'];
    $descripcion = $_POST['Descripcion'];
    
	$img_name = $_FILES['ImagenVendedor']['name'];
	$img_size = $_FILES['ImagenVendedor']['size'];
	$tmp_name = $_FILES['ImagenVendedor']['tmp_name'];
	$error = $_FILES['ImagenVendedor']['error'];

	if ($error === 0) {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name;
			move_uploaded_file($tmp_name, $img_upload_path);

            $sql = "insert into vendedores(NombreNegocio, password,  Email, Telefono, Ubicacion, Descripcion, ImagenVendedor) VALUES('$Name','$password','$email','$number','$ubicacion','$descripcion')";
			mysqli_query($conn, $sql);

            //$stmt = $conn->prepare("insert into vendedores(NombreNegocio, password,  Email, Telefono, Ubicacion, Descripcion, ImagenVendedor) values(?, ?, ?, ?, ?, ?, ?)");
		    //$stmt->bind_param("sssisss", $Name, $password , $email, $number, $ubicacion, $descripcion, $new_img_name);
		    //$execval = $stmt->execute();
		    //echo $execval;
		    //echo "Registration successfully...";
		    //$stmt->close();
		    $conn->close();
	}else {
        echo "Sucedio un error";
	}


    $url= 'paginaPrincipalVendedores.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';

    } 

?>