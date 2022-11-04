<?php
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    session_start();

    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


    $_SESSION['email1'] = $_POST['Email'];
    $_SESSION['pass1'] = $_POST['password'];

    $emailactual = $_SESSION['email1'];
    $passactual = $_SESSION['pass1'];

    $consultaVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$emailactual' AND vendedores.contrasenia = '$passactual' LIMIT 1");
    $consultaCompradores = mysqli_query($conn,"SELECT * FROM compradores WHERE Email = '$emailactual' AND compradores.contrasenia = '$passactual' LIMIT 1");

    

    if (mysqli_num_rows($consultaVendedores) > 0){
        $url = '../paginaPrincipalVendedores.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';

    }else if(mysqli_num_rows($consultaCompradores) > 0){
        $url= '../paginaPrincipalCompradores.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }else{
        $url= 'login.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    } 

    /* $tipoVendedor = "V";
    $tipoComprador = "C";

    echo $tipoUsuario;

    if (strcmp($tipoUsuario, $tipoVendedor) === 0){
        $url = 'paginaPrincipalVendedores.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }
    elseif(strcmp($tipoUsuario, $tipoComprador) === 0){
        $url= 'paginaPrincipalCompradores.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    } 
    else{
        $url= 'login.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }         */
?>