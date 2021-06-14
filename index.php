<?php
    include "config/conexion.php";
    session_start();
    $usuario = $_SESSION['usuario'];

    require 'config/conexion.php';
    $query = "select cliNombre as nombre from clientes WHERE cliUsuario = '$usuario'";
    $query2 = "select cliId as id from clientes WHERE cliUsuario = '$usuario'";
    $consulta = mysqli_query($db,$query);
    $consulta2 = mysqli_query($db,$query2);    
    $array = mysqli_fetch_array($consulta);
    $array2 = mysqli_fetch_array($consulta2);

    $_SESSION['nombre'] = $array['nombre'];
    $_SESSION['id'] = $array2['id'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body background="https://image.freepik.com/vector-gratis/perro-gato-pug-hueso-espinas-pescado-huellas-pata-fondo-vector-patron-transparente-bola_7688-21.jpg">
   
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
                <li class="nav-item">
                    <a class="nav-link disabled" href="php/mascotas.php" tabindex="-1" aria-disabled="true">Agregar Macotas</a>
                </li>
            </ul>
           <form  method="POST"><button class="btn btn-danger" type="submit" name="destruir">Cerrar Sesion</button></form>
        </div>
    </nav>


    <br><br><br><br><br>
    <div class="container">
        <div class="alert alert-dark">
            <marquee>
            <h2><b><-- Bienvenido a !! PELUDOS EC !! <?php echo $array['nombre'];?> --></b></h2>
            </marquee>
        </div>
    </div>
    
 
    <div class="row">
        <?php
            $consulta = $db->query("select * from mascota");
            if($consulta->num_rows > 0){
                while($row = $consulta->fetch_assoc()){
        ?>
        <div class="col-3" >
            <div class="card">
                <img class="card-img-top" src="<?php echo$row["rutaFoto"] ?>" alt="img" height="250px;">
                <div class="card-body">
                <center>
                    <h3 class="card-title"><strong>Especie: </strong><?php echo$row["especie"] ?></h3>
                    <h4 class="card-title"><strong>Raza: </strong><?php echo$row["raza"] ?></h4>
                    <p class="card-text"><strong>Content: </strong><?php echo$row["detalle"] ?></p>
                </center>
                </div>
                <div class="col-1" >
                <a class="btn btn-success" href="php/solicitarPedido.php?action=addItem&id=<?php echo $row['id'] ?>">Agregar</a>
                </div>
                <br>
            </div>
        </div>
        <?php
                }
            }else{
                echo"<h1><center><b>No existen resultados</b></center></h1>";
            }
            if(isset($_POST['destruir'])){
                session_destroy();     
                header('Location: php/login.php');           
            }
        ?>
    </div>

 
</body>
</html>

