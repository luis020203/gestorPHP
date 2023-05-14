<?php
session_start();
error_reporting(0);
$varsession = $_SESSION['usuario'];
if ($varsession== null || $varsession=''){
    header("location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>GESTION</title>
  <link rel="stylesheet" href="http://localhost/proyecto_final/assets/css/t_archivo.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">




  <style type="text/css">
  </style>
</head>
<body>
<?php include 'C:/xampp/htdocs/proyecto_final/paginas/menu.php'?>

<div class="container">

  <div class= "table-responsive">
    <main class="table">
          <section class="table__header">
            <h2>TIPO DE ARCHIVOS</h2>
          </section>
        <table class="table table-bordered" id="table_id">
            <div class="tipo">
                <form  action="acciones/categoria.php" class="form" method="post">
                    <p>Agregar categoria</p>
                    <input type="text" name="tipo">
                    <input type="submit" name="enviar" value="Crear categoria">
                </form>
            </div>
            
          <thead>
            <tr>
              <th>#</th>
              <th>TIPO DE ARCHIVO</th>
              <th></th>
              <th>OPCIONES</th>
            </tr>
          </thead>    
          <tbody>
            <?php
              include 'C:/xampp/htdocs/proyecto_final/paginas/bd.php';
              $query = listar_categoria($conn);
              if (mysqli_num_rows($query) > 0) {
                while ($datos=mysqli_fetch_assoc($query)) { 
                  $contador++;
                  $id= $datos['id'];
                  $tipo= $datos['tipo_archivo'];
              
            ?>
            <tr> 
              <td><?php echo  $contador;?></td>
              <td><?php echo $tipo;?></td>
              <td><span class="icon"><i class="fa fa-folder"></i></span></td>
              <td><a href="acciones/eliminar_categoria.php?id=<?php echo $id?>" class='eliminar'><i class='bi bi-trash-fill'></i></a></td> 
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
