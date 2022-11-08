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

    $email = $_SESSION['email1'];
    $password = $_SESSION['pass1'];

    $consultaVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$email' AND vendedores.contrasenia = '$password' LIMIT 1");
    $consultaCompradores = mysqli_query($conn,"SELECT * FROM compradores WHERE Email = '$email' AND compradores.contrasenia = '$password' LIMIT 1");

    if (mysqli_num_rows($consultaVendedores) > 0){

        $consultaIdVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$email' AND vendedores.contrasenia = '$password' LIMIT 1");

        while ($row = mysqli_fetch_row($consultaIdVendedores)) {
            $last_id = $row[0];
            $_SESSION['idUsuario'] = $last_id;

            echo $_SESSION['idUsuario'];
         }

            $url= '../paginaPrincipalVendedores.php';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
           
    }else if(mysqli_num_rows($consultaCompradores) > 0){

        $query = "INSERT INTO compradores(contrasenia,  Email) VALUES ('$password', '$email')";
        $insertar = $conn->query($query);

        if($insertar){

            $last_id = $conn->insert_id;
            $_SESSION['idUsuario'] = $last_id;
    
            $query1 = "DELETE FROM compradores ORDER BY id DESC LIMIT 1";
            $insertar1 = $conn->query($query1);

            echo $_SESSION['idUsuario'];
        
            //$url= '../paginaPrincipalCompradores.php';
            //echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
           }else{
            echo "Los datos no pudieron insertarse";
        } 

    }else{
        $url= '../loginFallido.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    } 

    //delete from marks order by id desc limit 1
    

    

    /* 

    $consultaIdCompradores = mysqli_query($conn,"SELECT * FROM compradores WHERE Email = '$emailactual' AND compradores.contrasenia = '$passactual' LIMIT 1");
    $consultaIdVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$emailactual' AND vendedores.contrasenia = '$passactual' LIMIT 1");

    if (mysqli_num_rows($consultaIdCompradores) > 0) {
        while ($row = $result -> fetch_row()) {
            printf ($row[0]);
        }
    } elseif(mysqli_num_rows($consultaIdVendedores) > 0) {
        while ($row = $result -> fetch_row()) {
            printf ($row[0]);
        }
    } else{
        $url= '../loginFallido.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }
    
    
    
    

    */

    
?>


