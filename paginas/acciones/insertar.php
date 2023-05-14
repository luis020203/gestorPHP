<?php
ob_start();
session_start();
#CAPTURAR DATOS
    $nombre = trim($_POST['nombre']);
    $tipo_archivo = trim($_POST['tipo']);
    $archivo = $_FILES['archivo']['name'];
    var_dump($archivo);

#TIPO
$tipo = $_FILES['archivo']['type'];
$categoria = explode('.',$archivo)[1];

#FECHA
$fecha = date('Y-m-d H:i:s');

#ARCHIVO
$tmp_name = $_FILES['archivo']['tmp_name'];
$contenido = file_get_contents($tmp_name);
$archivoBlob = addslashes($contenido);
$carpeta = '../../uploads/';
$ruta = $carpeta.$archivo;
echo move_uploaded_file($tmp_name, $ruta);

#USUARIO
$usuario = $_SESSION['usuario'];

include 'C:/xampp/htdocs/proyecto_final/paginas/bd.php';
$conn = $conn;
$query = insertar($conn, $categoria, $nombre, $fecha, $ruta, $tipo, $usuario, $tipo_archivo);
if($query){
    header('location: http://localhost/proyecto_final/paginas/verdocs.php');
}else{
    echo 'error al subir archivo';
}
?>