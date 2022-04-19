<?php
if (!empty($_SERVER['HTTP_X_REQUESTD_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTD_WITH']) == 'xmlhttprequest') {
    require 'conexion.php';
    sleep(2);
    session_start();

    $mysqli->set_charset('utf8');
    $usuario = $mysqli->real_escape_string($_POST['userlg']);
    $password = $mysqli->real_escape_string($_POST['passlg']);

    if ($nueva_consulta = $mysqli->prepare("SELECT usuario, tipo_usuario FROM datos WHERE usuario = '$usuario' AND clave = '$password'")) {
        $nueva_consulta->bind_param('ss', $usuario, $password);
        $nueva_consulta->execute();
        $res = $nueva_consulta->get_result();


        if ($res->num_rows == 1) {
            $data = $res->fetch_assoc();
            $_SESSION['user'] = $data;
            echo json_encode(array('error' => false, 'tipo' => $data['tipo_usuario']));
        }
        else {
            echo json_encode(array('error' => true));
        }
        $nueva_consulta->close();
    }

}


$mysqli->close();
?>

<!--?php

    session_start();
    if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"]["privilegio"] == 1) {
            header("location:logica/admin/datos.php");
        }
            
        }
    }
    header("location:login.php")

?-->



<!--
require 'conexion.php';

include("conexion.php");
$con = connetion();

$usuarios = $con->query("SELECT usuario, clave
        FROM datos
        WHERE usuario = '" . $_POST['userlg'] . "'
        AND clave = '" . $_POST['passlg'] . "'");

if ($usuarios->num_rows == 1) :
    $datos = $usuarios->fetch_assoc();
    echo json_encode(array('error' => false, 'tipo' => $datos['Tipo_usuario']));
else :
    echo json_encode(array('error' => true));
endif;

$con->close();

-->