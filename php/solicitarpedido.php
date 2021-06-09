<?php

include "pedidos.php";
include "../config/conexion.php";

$pedidos = new Pedidos;

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addItem' && !empty($_REQUEST['masid'])){
        $id = $_REQUEST['masid'];

        $query = $conectar->query("Select * from mascotas where masid = ".$id);
        $row = $query->fetch_assoc();
        $itemData = array(
            'masid' => $row['masid'],
            'especie' => $row['especie'],
            'precio' => $row['precio'],
            'cantidad' => 1
        );
        $insertItem = $pedidos->insert($itemData);
        $redirectLoc = $insertItem?'carrito.php':'../index.php';
        header("Location: ".$redirectLoc);
    }else if($_REQUEST['action'] == 'removeItem' && !empty($_REQUEST['masid'])){
        $deleteItem = $pedidos->remove($_REQUEST['masid']);
        header("Location: carrito.php");
    }else if($_REQUEST['action'] == 'updateItem' && !empty($_REQUEST['masid'])){
        $itemData = array(
            'rowid'=>$_REQUEST['masid'],
            'cantidad'=>$_REQUEST['cantidad']
        );
        $updateItem = $pedidos->updateItem($itemData);
        echo $updateItem?'ok':'err';
        die;
    }
}

///ALTER table mascotas
//add COLUMN precio float(10,2);