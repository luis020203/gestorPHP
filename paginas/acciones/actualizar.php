<?php
ob_start();
$id = $_POST['id'];///CAPTURO EL ID DE MI DOCUMENTO
#CAPTURAR DATOS
    $nombre = trim($_POST['nombre']);
    $tipo_archivo = trim($_POST['tipo']);
    $archivo = $_FILES['archivo']['name'];
include 'C:/xampp/htdocs/proyecto_final/paginas/bd.php';
$conn = $conn;
$datos = datos($conn,$id);
$nombreA = $datos['nombre'];

if(($_FILES['archivo']['size']==0 && $nombre=='') || ($_FILES['archivo']['size']==0 && $nombre==$nombreA) ){ #no modifico el archivo
    header("location:../editar.php?id=$id");
}

#TIPO
$tipo = $_FILES['archivo']['type'];
$categoria = explode('.',$archivo)[1];

#FECHA
$fecha = date('Y-m-d H:i:s');

#ARCHIVO
$tmp_name = $_FILES['archivo']['tmp_name'];
$contenido = file_get_contents($tmp_name);
$carpeta = '../../uploads/';
$ruta = $carpeta.$archivo;
echo move_uploaded_file($tmp_name, $ruta);

if(($_FILES['archivo']['size']>0 && $nombre!='') || ($_FILES['archivo']['size']>0 && $nombre!=$nombreA)){     #modificar todo
    $query=actualizar($conn, $id, $categoria, $nombre, $fecha, $ruta, $tipo, $tipo_archivo);
    header("location: ../verdocs.php");
}

?>

