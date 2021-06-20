<?php

class miClase{
    public function insertar(string $nombre,string $cedula,string $usuario,string $contrasenia,string $email,string $telefono,string $direccion){
        include("../config/conexion.php");
        $sql ="insert into clientes(cliId, cliNombre, cliCedula, cliUsuario, cliContraseña, cliCorreo, cliTelefono, cliDirección) values ('','$nombre','$cedula','$usuario','$contrasenia','$email','$telefono','$direccion')";
        $query = mysqli_query($db, $sql);
        return ;
    }
}
try {
    $server = new SoapServer(null,[
        'uri' => 'http://localhost/TiendaMascotasGit/Grupo01-TiendaMacotas-1/servicios/server.php'
    ]);

    $server->setClass('miClase');
    $server->handle();
} catch (SoapFault $f) {
    print $f->faultstring;
}
?>