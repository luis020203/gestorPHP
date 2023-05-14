<?php
session_start();
error_reporting(0);
$varsession = $_SESSION['usuario'];
if ($varsession== null || $varsession=''){
    header("location: index.php");
    die();
}
$id=$_GET['id'];
include 'bd.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://localhost/proyecto_final/assets/css/tesis.css">
    <style type="text/css">
    </style>    
</head>
<?php 
include 'C:/xampp/htdocs/proyecto_final/paginas/menu.php'
?>
<body>
    <div class="container">
    <div class="card">
         <h3>ACTUALIZAR ARCHIVOS</h3>
         <br><br>
        <div class="drop_box">
            <form action="acciones/actualizar.php" class="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <p>Nombre</p>
                <input type="text" name="nombre" value="">
                <select name="tipo" id="tipo">
                    <?php 

                    include 'C:/xampp/htdocs/proyecto_final/paginas/conexion.php';
                    $id_categoria = mysqli_insert_id($conn); // Recuperar id del documento

                    $usuario = $_SESSION['usuario'];
                    $sql_select_user = "SELECT id FROM usuario WHERE usuario = '$usuario' ";
                    $resultado_select_user = mysqli_query($conn, $sql_select_user);
                    $registro_select_user = mysqli_fetch_assoc($resultado_select_user);
                    $id_usuario = intval($registro_select_user['id']); //Recuperar id del usuario
                    $consulta =  "SELECT tipo_archivo FROM gestionar_usuario_categoria
                    right join usuario on gestionar_usuario_categoria.id_usuario = usuario.id
                    join tipo_archivo on gestionar_usuario_categoria.id_categoria = tipo_archivo.id
                    where usuario.id = '$id_usuario'";
                    $ejecutar = mysqli_query($conn,$consulta) or die(mysqli_error($conn));
                    ?> 
                    <?php foreach ($ejecutar as $opciones): ?>
                    <option value="<?php echo $opciones['tipo_archivo']?>"><?php echo $opciones['tipo_archivo']?></option>
                    <?php endforeach ?>
                </select>
                <input name="archivo" type="file" class="file-upload-field">
                <br><br>
                <input type="submit" name="enviar" value="Enviar">
                <a href="verdocs.php">Volver</a>
        </form>
        </div>
        
    </div>
    
    </div>
</body>

</html>


