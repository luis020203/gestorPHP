<?php
session_start();
error_reporting(0);
$varsession = $_SESSION['usuario'];
if ($varsession== null || $varsession=''){
    header("location: index.php");
    die();
}
?>



<!--TABLA-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GESTION</title>
  <link rel="stylesheet" href="http://localhost/project_clone/assets/css/visualizar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">



  <link rel="stylesheet" href="C:/xampp/htdocs/project_clone/assets/css/visualizar.css">

  <style type="text/css">
  </style>
</head>
<body>
<?php include 'C:/xampp/htdocs/proyecto_final/paginas/menu.php'?>

<div class="container">

  <div class= "table-responsive">
    <main class="table">
          <section class="table__header">
            <h2>GESTION DE ARCHIVOS</h2>
            <a href="loadtesis.php">Subir archivos</a>
          </section>
        <table class="table table-bordered" id="table_id">
          <thead>
            <tr>
              <th>CATEGORIA DE ARCHIVO</th>
              <th>NOMBRE</th>
              <th>FECHA</th>
              <th>TIPO</th>
              <th>USUARIO</th>
              <th>OPCIONES</th>
            </tr>
          </thead>    
          <tbody>
            <?php
              include 'C:/xampp/htdocs/proyecto_final/paginas/bd.php';
              $query = listar($conn);
              if (mysqli_num_rows($query) > 0) {
                while ($datos=mysqli_fetch_assoc($query)) { 
                  $contador++;
                  $id= $datos['id'];
                  $tipo_archivo=$datos['clase_archivo'];
                  $nombre= $datos['nombre'];
                  $categoria= $datos['categoria'];
                  $fecha= $datos['fecha'];
                  $ruta = $datos['ruta'];
                  $tipo= $datos['tipo'];
                  $usuario = $datos['usuario'];
              
              $valor = "";
              if($categoria== 'pdf'){
                $valor="<img width='40' src='http://localhost/project_clone/img/pdf.png'>";
              }    
              if($categoria== 'xls' || $categoria== 'xlsx'){
                $valor="<img width='40' src='http://localhost/project_clone/img/exel.png'>";
              }
              if($categoria== 'docx' || $categoria== 'doc'){
                $valor="<img width='40' src='http://localhost/project_clone/img/word.png'>";
              }
              if($categoria== 'jpg' || $categoria== 'png'){
                $valor="<img width='40' src='http://localhost/project_clone/img/jpg.png'>";
              }
            ?>
            <tr>
              <td><?php echo $tipo_archivo;?></td> 
              <td><?php echo $nombre;?></td>
              <td><?php echo $fecha;?></td>
              <td><center><?php echo $valor;?></center></td>
              <td><?php echo $usuario;?></td>
              <td><a href="actualizar.php?id=<?php echo $id?>" class='editar'><i class='bi bi-pencil-square'></i></a> <a href="acciones/eliminar.php?id=<?php echo $id?>" class='eliminar'><i class='bi bi-trash-fill'></i></a> 
              <a class= "descargar" href="acciones/cargar.php?id=<?php echo $id?>"><?php?><i class="bi bi-cloud-download"></i></a> </td> 
            </tr>
            <?php
                }}
            ?>
          </tbody>
        </table>
      </main>
  </div>
  </div>
</div>  
        
</body>
</html>
