<?php
    include "config/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOS PELUDOS ECUADOR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
       <a class="navbar-brand" href="index.php"> <img src="img/logo.jpg" width="60" height="60" alt="logo"></a>
       <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div id="my-nav" class="collapse navbar-collapse">
           <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                   <a class="nav-link" href="index.php">INICIO<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                   <a class="nav-link disabled" href="php/carrito.php" tabindex="-1" aria-disabled="true">CARRITO</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">PAGOS</a>
               </li>
               
           </ul>
       </div>
   </nav>
   <div class="container">
        <div class="alert alert-success">
            Mensajess....
        </div>    
   </div>
   <div class="row">
   <br>   
   <?php
    $query = $conectar->query("select * from mascotas;");
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
   ?>
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="<?php echo $row["rutaFoto"]?>.jpg" alt="">
                <div class="card-body">
                    <h3 class="card-title"> <strong>Especie: <?php echo $row["especie"]?></strong></h3>
                    <h4 class="card-title"><strong>Raza: <?php echo $row["raza"]?></strong> </h4>
                    <p class="card-text"><strong>Detalle: <?php echo $row["descripcion"]?></strong> </p>
                    <div class="col-1">
                        <a class="btn btn-success" href="php/solicitarpedido.php?action=addItem&id=<?php echo $row['id'] ?>">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    }else{
        echo "<h1>No existen animales disponible</h1>";
    }

    ?>
   </div>
</body>
</html>