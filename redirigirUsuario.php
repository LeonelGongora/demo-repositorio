<?php
    require 'conexion.php';
    session_start();
    $_SESSION['email1'] = $_POST['Email'];
    $_SESSION['pass1'] = $_POST['password'];

    $emailactual = $_SESSION['email1'];
    $passactual = $_SESSION['pass1'];

    $consultaVendedores = mysqli_query($conexion,"SELECT * FROM vendedores WHERE Email = '$emailactual' AND vendedores.password = '$passactual' LIMIT 1");
    $consultaCompradores = mysqli_query($conexion,"SELECT * FROM compradores WHERE Email = '$emailactual' AND compradores.password = '$passactual' LIMIT 1");

    

    if (mysqli_num_rows($consultaVendedores) > 0){
        echo "Usted ingreso como vendedor";

    }else if(mysqli_num_rows($consultaCompradores) > 0){
        echo "Usted ingreso como comprador";
    }else{
        echo "El usuario que intenta ingresar no existe";
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