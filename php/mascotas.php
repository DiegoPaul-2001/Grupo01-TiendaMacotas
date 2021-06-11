<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Mascotas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand"><img src="img/logo.png" style="height: 60px ; width: 80px;"></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="php/Carrito.php" tabindex="-1" aria-disabled="true">Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Pagos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contactanos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="php/login.php" tabindex="-1" aria-disabled="true">Iniciar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br><br><br><br><br>

    <div class="container">
        <center><h2>Agregar mascotas</h2></center>
        <br><br>
        <form method="Post" action="">
            <center><div class="form-group col-5">
                <label for="">Especie</label><br><input type="text" name="especie" class="form-control"><br>
                <label for="">Raza</label><br><input type="text" name="raza" class="form-control"><br>
                <label for="">Detalle</label><br><input type="text" name="detalle" class="form-control"><br>
                <label for="">Fecha de Nacimiento</label><br><input type="text" name="fechaNacimiento" class="form-control"><br>
                <label for="">Estado</label><br><input type="text" name="estado" class="form-control"><br>
                <label for="">Ruta de foto</label><br><input type="text" name="ruta" class="form-control"><br>
                <label for="">Precio</label><br><input type="text" name="precio" class="form-control"><br>
            </div>
            <div>
                <button class="btn btn-primary" type="button" name="agregar">Agregar</button>
            </div></center>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['agregar'])){
        $especie = $_POST['especie'];
        $raza = $_POST['raza'];
        $detalle = $_POST['detalle'];
        $fecha = $_POST['fechaNacimiento'];
        $estado = $_POST['estado'];
        $ruta = $_POST['ruta'];
        $precio = $_POST['precio'];
        $insertar = "INSERT INTO mascota VALUES ('','$especie','$raza','$detalle','$fecha','$estado','$ruta','$precio')";
        $query = mysqli_query($db, $insertar);
        
    }
?>