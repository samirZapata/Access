<?php
require_once("../conexion.php");
require_once("logica/components.php");
$con = connetion();

//CREAR DATOS
if (isset($_POST['saveD'])) {
    createData();
}

//ACTUALIZAR DATOS
if (isset($_POST['updateD'])) {
    updateData();
}

//ELIMINAR DATOS
if (isset($_POST['deleteD'])) {
    deleteData();
}

//LEER DATOS
if (isset($_POST['readD'])) {
    readData();
}
//___________________________________________________________


//GUARDAR PERILES
if (isset($_POST['saveP'])) {
    crearPerfiles();
}

//ACTULAZAR PERFILES
if (isset($_POST['updateP'])) {
    updateP();
}

//ELIMINAR PERFILES
if (isset($_POST['deleteP'])) {
    deleteP();
}

//REFRESCAR PERFILES
if (isset($_POST['readP'])) {
    getData();
}

//___________________________________________________________


//CREAR ACTIVIDA
if (isset($_POST['saveA'])) {
    createActivity();
}

//UPDATE ACTIVIDAD
if (isset($_POST['updateA'])) {
    updateActivity();
}

//ELIMINAR ACTIVIDAD
if (isset($_POST['deleteA'])) {
    deleteActivity();
}

//REFRESCAR ACTIVIDAD
if (isset($_POST['readA'])) {
    getActividad();
}

//___________________________________________________________

//CREAR ACTIVIDA
if (isset($_POST['saveG'])) {
    creategActivity();
}

//UPDATE ACTIVIDAD
if (isset($_POST['updateG'])) {
    updategActivity();
}

//ELIMINAR ACTIVIDAD
if (isset($_POST['deleteG'])) {
    deletegActivity();
}

//REFRESCAR ACTIVIDAD
if (isset($_POST['readG'])) {
    getgActividad();
}

//___________________________________________________________

//CARGAR DATA
function getData()
{
    $sql = "SELECT * FROM perfiles";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}



function txtValue($value)
{
    $txtBox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($txtBox)) {
        return false;
    }
    else {
        return $txtBox;
    }
}

//CREAR PERFILES
function crearPerfiles()
{
    $id = txtValue("id");
    $perfil = txtValue("perfil");
    if ($id && $perfil) {
        $sql = "INSERT INTO perfiles (id_perfil, perfiles) 
        VALUES ('$id', '$perfil')";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo " Registro creado exitosamente";
        }
        else {
            echo "Error";
        }
    }
    else {
        echo "No deje campos vacios";
    }
}

//UPDATE PERFILES
function updateP()
{
    $id = txtValue("id");
    $perfil = txtValue("perfil");

    if ($id && $perfil) {
        $sql = "
        UPDATE perfiles SET perfiles = '$perfil' WHERE id_perfil = '$id'
        ";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo "Registro actualizado exitosamente";
        }
        else {
            echo "Error";
        }
    }
    else {
        echo "Seleccione algun dato";
    }
}

//DELETE PERFILES
function deleteP()
{
    $id = (int)txtValue("id");
    $sql = "DELETE FROM perfiles WHERE id_perfil = '$id'";
    if (mysqli_query($GLOBALS['con'], $sql)) {
        echo "Registro eliminado exitosamente";
    }
    else {
        echo "Error";
    }
}
//___________________TABLA DATOS_________________________
//CREAR DATOS
function createData()
{
    $id = txtValue("id");
    $name = txtValue("name");
    $user = txtValue("user");
    $pass = txtValue("pass");
    $id_perfil = txtValue("id_perfil");
    $tuser = txtValue("tUser");

    if ($id && $name && $user && $pass && $id_perfil && $tuser) {
        $sql = "INSERT INTO datos (id, nombre, usuario, clave, id_perfil, tipo_usuario) 
        VALUES ('$id', '$name', '$user', '$pass', '$id_perfil', '$tuser')";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo " Registro creado exitosamente";
        }
        else {
            echo "Error";
        }
    }
    else {
        echo "No deje campos vacios";
    }


}

//CARGAR DATA
function readData()
{
    $sql = "SELECT * FROM datos";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

//UPDATE DATOS
function updateData()
{
    $id = txtValue("id");
    $name = txtValue("name");
    $user = txtValue("user");
    $pass = txtValue("pass");
    $id_perfil = txtValue("id_perfil");
    $tipo = txtValue("tUser");

    if ($id && $name && $user && $pass) {
        $sql = "UPDATE datos SET nombre = '$name', usuario = '$user', clave='$pass', tipo_usuario = '$tipo' WHERE id = '$id'";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo "Registro actualizado exitosamente";
        }
        else {
            echo "Error";
        }
    }
    else {
        echo "Seleccione algun dato";
    }
}

//ELIMINAR DATOS
function deleteData()
{
    $id = (int)txtValue("id");
    $sql = "DELETE FROM datos WHERE id = '$id'";
    if (mysqli_query($GLOBALS['con'], $sql)) {
        echo "Registro eliminado exitosamente";
    }
    else {
        echo "Error";
    }
}
//___________________FIN TABLA DATOS_________________________
//___________________TABLA ACTIVIDAD_________________________

//CREAR ACTIVIDAD
function createActivity()
{
    $id = txtValue("idActividad");
    $nom = txtValue("nomActividad");
    $enlace = txtValue("enlace");

    if ($id && $nom && $enlace) {
        $sql = "INSERT INTO actividades (idActividad, nomActividad, enlace) 
        VALUES ('$id', '$nom', '$enlace')";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo " Registro creado exitosamente";
        }
        else {
            echo "Error";
        }
    }
    else {
        echo "No deje campos vacios";
    }
}

//CARGAR DATA
function getActividad()
{
    $sql = "SELECT * FROM actividades";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

//UPDATE ACTIVIDAD
function updateActivity()
{
    $id = txtValue("idActividad");
    $nom = txtValue("nomActividad");
    $enlace = txtValue("enlace");

    if ($id && $nom && $enlace) {
        $sql = "UPDATE actividades SET nomActividad = '$nom', enlace = '$enlace' WHERE idActividad = '$id'";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo "Registro actualizado exitosamente";
        }
        else {
            echo "Error";
        }
    }
    else {
        echo "Seleccione algun dato";
    }
}

//DELETE ACTIVIDAD

function deleteActivity()
{
    $id = (int)txtValue("idActividad");
    $sql = "DELETE FROM actividades WHERE idActividad = '$id'";
    if (mysqli_query($GLOBALS['con'], $sql)) {
        echo "Registro eliminado exitosamente";
    }
    else {
        echo "Error";
    }
}

//_____________________________________________________________________

function creategActivity()
{
    $id = txtValue("idActividad");
    $idPerfil = txtValue("idPerfil");
    $idActividad = txtValue("idActividad");

    if ($id && $idPerfil && $idActividad) {
        $sql = "INSERT INTO gestactividad (idGestActividad, idPerfil, idActividad) 
        VALUES ('$id', '$idPerfil', '$idActividad')";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo " Registro creado exitosamente";
        }
        else {
            echo "Error";
        }
    }
    else {
        echo "No deje campos vacios";
    }
}

function getgActividad()
{
    $sql = "SELECT * FROM gestactividad";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

//UPDATE ACTIVIDAD
function updategActivity()
{
    $id = txtValue("idActividad");
    $idPerfil = txtValue("idPerfil");
    $idActividad = txtValue("idActividad");

    if ($id && $idPerfil && $idActividad) {
        $sql = "UPDATE gestactividad SET idPerfil = '$idPerfil' idActividad = '$idActividad' WHERE idGestActividad = '$id'";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo "Registro actualizado exitosamente";
        }
        else {
            echo "Error";
        }
    }
    else {
        echo "Seleccione algun dato";
    }
}

//DELETE ACTIVIDAD

function deletegActivity()
{
    $id = (int)txtValue("idGestActividad");
    $sql = "DELETE FROM gestactividad WHERE idGestActividad = '$id'";
    if (mysqli_query($GLOBALS['con'], $sql)) {
        echo "Registro eliminado exitosamente";
    }
    else {
        echo "Error";
    }
}


?>



