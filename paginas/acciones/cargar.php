<?php
    $id = $_GET['id'];
    include 'C:/xampp/htdocs/proyecto_final/paginas/bd.php';
    $cone = $conn;
    $datos = datos($conn, $id);

    $tipo=$datos['tipo'];
    $categoria=$datos['categoria'];
    $nombre=$datos['nombre'];
    $ruta=$datos['ruta'];

    

    $valor_tipo="Content-type:$tipo";
    header("Content-type: $tipo");
    header("Content-Disposition: attachment; filename=$nombre.$categoria");
    readfile($ruta);
?>