<?php
ob_start();
$id = $_GET['id'];///CAPTURO EL ID DE MI DOCUMENTO

include 'C:/xampp/htdocs/proyecto_final/paginas/bd.php';
$conn= $conn;
$sql = "SELECT ruta FROM archivo WHERE id = $id";
$resultado = mysqli_query($conn, $sql);
$archivo = mysqli_fetch_assoc($resultado);
$ruta = $archivo['ruta'];

// Eliminar el archivo del servidor
if (unlink($ruta)) {
  // Eliminar el registro de la base de datos
  $query = eliminar($conn, $id);
  if ($query) {
    header('Location: ../verdocs.php');
  } else {
    echo 'error al eliminar archivo de la base de datos';
  }
} else {
  echo 'error al eliminar archivo del servidor';
}
?>

