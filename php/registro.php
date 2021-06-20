<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>ISTVN</title>
    <!--Made with love by Mutiullah Samim -->
    <center>
        <h1 style="color: white">GRUPO 1</h1>
    </center>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h3>Registro Clientes</h3>
                    </center>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombres" id="nombre" name="nombre">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card"></i> </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Cedula" id="cedula" name="cedula">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" id="contra" name="contra">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Telefono" id="telefono" name="telefono">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Direccion" id="direccion" name="direccion">
                        </div>

                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <center><input type="submit" value="Enviar " class="btn login_btn" name="entrar"></center>
                            <br>
                            <a href="login.php" class="btn btn-danger" style="float: right;">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
</body>

</html>
<?php
if (isset($_POST['entrar'])) {
    
$cliente = new SoapClient("http://localhost/TiendaMascotasGit/Grupo01-TiendaMacotas-1/servicios/wdsl.xml");
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $return =$cliente->__insertar([$nombre,$cedula,$usuario,$contra,$email,$telefono,$direccion]);

}




/*if (isset($_POST['entrar'])) {

    if ($_POST["nombre"] == '' && $_POST["cedula"] == '' && $_POST["usuario"] == '' && $_POST["contra"] == '' && $_POST["email"] == '' && $_POST["telefono"] == '' && $_POST["direccion"] == '') {
        echo "<script>
                alert('Por favor Ingrese los Datos !!');
    </script>";
    } else {
        $nombre = $_POST["nombre"];
        $cedula = $_POST["cedula"];
        $usuario = $_POST["usuario"];
        $contra = $_POST["contra"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $consulta = "INSERT INTO clientes VALUES ('0','$nombre','$cedula','$usuario','$contra','$email','$telefono','$direccion')";
        $query = mysqli_query($db, $consulta);

        if ($query) {
            echo "<script>
                alert('Usuario registrado Exitosamente !!');
                window.location.href='login.php';
    </script>";
        } else {
            echo "<script>
                alert('Error verifique !!');
    </script>";
        }
    }
}*/
?>