<?php
ob_start();
$id = $_GET['id'];///CAPTURO EL ID DE MI CATEGORIA

include 'C:/xampp/htdocs/proyecto_final/paginas/bd.php';
$conn= $conn;

$query = eliminar_categoria($conn, $id);
if ($query) {
    header('Location: ../tipo_archivo.php');
  } else {
    echo 'error al eliminar archivo de la base de datos';
  }
?>