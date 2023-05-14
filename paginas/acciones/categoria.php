<?php
ob_start();
session_start();

$tipo = trim($_POST['tipo']);

#USUARIO
$usuario = $_SESSION['usuario'];

include 'C:/xampp/htdocs/proyecto_final/paginas/bd.php';
$conn = $conn;
$query = insertar_tipo($conn, $tipo, $usuario);
if($query){
    header('location: http://localhost/proyecto_final/paginas/tipo_archivo.php');
}else{
    echo 'error al subir categoria';
}
?>
