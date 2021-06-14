<?php
include 'Pedidos.php';
$pedidos = new Pedidos;
session_start();
$nombre = $_SESSION['nombre'];
$id = $_SESSION['id'];


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CARRITO</title>

    <!--FUENTE LETRA:-->
    <link rel="stylesheet" href="https://use.typekit.net/mdi6pgl.css">
    <!--BOOTSTRAP/CSS:-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--BOOTSTRAP:-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        function updateItem(e, id){
            let cantidad = e.value;
            let xhttp = new XMLHttpRequest();
            xhttp.onload = function(){
                //Actualizar pagina
                if(this.response == 'ok'){
                    window.location= "Carrito.php";
                }else{
                    document.getElementById("mensaje").innerHTML = "Error en actualizar !!!"
                }
            }
            xhttp.open("GET","SolicitarPedido.php?action=updateItem&id=" + id + "&cantidad=" + cantidad );
            xhttp.send();
        }
    </script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand"><img src="../img/logo.png" style="height: 60px ; width: 80px;"></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="Carrito.php" tabindex="-1" aria-disabled="true">Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Pagos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contactanos</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <!--CONTENEDOR MENSAJE-->
    <div class="container">
    <div class="alert alert-dark" id="mesnaje">
                    <center><h2> <----------------- Detalle De Pedido de <?php echo $nombre ?> -----------------></h2></center>
            </div>
        <form method="POST">
        <table class="table">
            <thead>
                <tr>
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
                $sumador_de_cantidades = 0;
                if (isset($_SESSION['cart_contents']) && $_SESSION['cart_contents']> 0 && $_SESSION['cart_contents']['total_items'] !=0) {
                    foreach ($_SESSION['cart_contents'] as $items) {
                        if (isset($items['id']) && !empty($items['id'])) {
                            echo "<tr><td>" . $items['id'] . "</td><td>" . $items['especie'] .
                                "</td><td name='precio' >" . $items['price'] . "</td><td><input type='number' name='cantidad' onchange='updateItem(this,".$items['id'].")' value='" . $items['cantidad'] .
                                "'</td><td>$" . $items['subtotal'] . "</td>
                                <td><a href='SolicitarPedido.php?action=removeItem&id=" . $items['id'] . "' class='btn btn-danger'" . "onclick=''>ELIMINAR</a></td></tr>";
                                $sumador_de_cantidades = $sumador_de_cantidades +$items['subtotal'];

                        }
                    }
                 echo " <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td><h2><b>Subtotal:</b><h2></td><td><input type='text' name='totalpagar' value='".$sumador_de_cantidades." '>$</td><td><button class='btn btn-primary' name='comprar' type='submit'>COMPRAR</button></td></tr>" ;   
                } else {
                    echo "<tr><td colspan='6'><center><h1>No hay datos</h1></center></td></tr>";
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
                    <th>&nbsp;</th>
                </tr>
                </tr>
            </tfoot>
        </table></form>
    </div>
</body>
</html>
<?php    
    include ("../config/conexion.php");
                $buscar = "SELECT (MAX(ordId)+1) as idorden FROM orden";            
                $querybus= mysqli_query($db,$buscar); 
                $busid= mysqli_fetch_array($querybus);
                $id = $busid['idorden'];
    if(isset($_POST['comprar'])){           
        $total =$_POST['totalpagar'];
        $insertar = "Insert into orden values('','$id','$total','NOw()','NOW()','1')";        
        $query= mysqli_query($db,$insertar);
        
        foreach ($_SESSION['cart_contents'] as $items) {                   
            if (isset($items['id']) && !empty($items['id'])) { 
                $insertarD="Insert into detalleorden values('','$id','".$items['id']."','". $items['cantidad'] ."')";
                $query= mysqli_query($db,$insertarD);
            }
        }
        if($query){
            echo "Ingreso correctamente";
        }else{
            echo "no ingresa";
        }
    }
?>