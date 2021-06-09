<?php
include 'Pedidos.php';
$pedidos = new Pedidos;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        function updateItem(e, id){            
          let cantidad = e.value;
          let xhttp = new XMLHttpRequest();
          xhttp.onload = function(){              
              if(this.response == 'ok'){
                  window.location="carrito.php";
              }else{
                  document.getElementById('mensaje').innerHTML='Error al actualizar';
              }
          }
          xhttp.open('GET','solicitarpedido.php?action=updateItem&masid='+id+'&cantidad='+cantidad);
          xhttp.send();
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="index.php" class="navbar-brand"><img src="../img/logo.jpg" alt="logo" whith="60" height="60" /></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="Carrito.php" tabindex="-1" aria-disabled="true">Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Pagos</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <h1 class="alert alert-success" id="mensajes">Carrito de compras</h1>
        <table class="table">
            <thead>
                <tr >
                    <th>Id</th>
                    <th>Especie</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>            
                <?php                
                    if($_SESSION['cart_contents']>0){
                        foreach($_SESSION['cart_contents'] as $items){
                            if(isset($items['masid']) && !empty($items['masid']) ){
                            
                            echo "<tr><td>".$items['masid']."</td><td>".$items['especie'].
                            "</td><td>".$items['precio']."</td><td><input type='number' onchange='updateItem(this,".$items['masid'].")' value='".$items['cantidad']."' > 
                            </td><td>$".$items['subtotal']."</td>
                            <td> <a href='solicitarpedido.php?action=removeItem&masid=".$items['masid']."' class='btn btn-danger' onclick=''>Eliminar</a></td>
                            </tr>";


                            }
                        }
                    }else{
                       echo "<tr><td colspan='6'><h1>No hay datos</h1></td></tr>"; 
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                <tr>
                    <th>Id</th>
                    <th>Especie</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                    <form method="POST"><th><button class="btn btn-primary" type="submit" name="agregar">Comprar</button></th></form>
                </tr>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
<?php
    if(isset($_POST['agregar'])){
        
    }
?>