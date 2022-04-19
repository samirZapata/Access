<?php
require_once("logica/components.php");
require_once("logica/operaciones.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gest Actividades</title>
    <link rel="stylesheet" href="../../css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <main>
        <div class="container text-center">
            <h1 class="headd"><i class="fas fa-brands fa-angrycreative"></i> Admin</h1>
            <ul class="menu">
                <li><a href="perfiles.php" target="blank">Perfiles</a></li>
                <li><a href="datos.php" target="blank">Datos</a></li>
                <li><a href="actividades.php" target="blank">Actividades</a></li>
                <li><a href="gestActividades.php" target="blank">Gest Actividades</a></li>

            </ul>
            </h1>
            <div class="d-flex justify-content-center">

                <form action="" method="POST" class="w-50">

                    <div class="pt-2">
                        <?php inputElement("", "ID gest actividad", "idGestActividad", ""); ?>
                    </div>

                    <div class="row pt-2">
                        <div class="col">
                            <?php inputElement("", "Id perfil", "idPerfil", ""); ?>
                        </div>

                        <div class="col">
                            <?php inputElement("", "Id Actividad", "idActividad", ""); ?>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-save", "btn btn-success",  "<i class='fas fa-plus'></i>", "saveG", "data-toggle='tooltip' data-placement='bottom' title='Crear'"); ?>
                        <?php buttonElement("btn-update", "btn btn-light border",  "<i class='fas fa-pen-alt'></i>", "updateG", "data-toggle='tooltip' data-placement='bottom' title='Actualizar'"); ?>
                        <?php buttonElement("btn-delete", "btn btn-danger",  "<i class='fas fa-trash'></i>", "deleteG", "data-toggle='tooltip' data-placement='bottom' title='Eliminar'"); ?>
                        <?php buttonElement("btn-read", "btn btn-primary",  "<i class='fas fa-sync'></i>", "readG", "data-toggle='tooltip' data-placement='bottom' title='Refrescar'"); ?>
                    </div>
                </form>
            </div>
            <div class="d-flex table-data">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID ges actividad</th>
                            <th>ID Perfil</th>
                            <th>ID Actividad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-read">
                        <?php

                        if (isset($_POST['readG'])) {
                            $result = getgActividad();

                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td data-id="<php echo $row['idGestActividad']; >?"><?php echo $row['idGestActividad'] ?></td>
                                        <td data-id="<php echo $row['idPerfil']; >?"><?php echo $row['idPerfil'] ?></td>
                                        <td data-id="<php echo $row['idActividad']; >?"><?php echo $row['idActividad'] ?></td>
                                        <td>
                                            <span class="px-2 py-1 text-warning bg-dark rounded jj btnedit"><i class="fas fa-pen-alt btnedit" data-id="<php echo $row['idGestActividad']; >?"></i></span>
                                            <!--span class="px-2 py-1 text-danger bg-dark rounded jj"><i class="fas fa-trash btnedit"></i></span-->
                                        </td>
                                    </tr>

                        <?php
                                }
                            }
                        }

                        ?>
                    </tbody>

                </table>

            </div>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>