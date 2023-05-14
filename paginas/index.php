<?php
    error_reporting(E_ALL);

    ini_set('ignore_repeated_errors', TRUE);

    ini_set('display_errors', FALSE);

    ini_set('log_errors',TRUE);

    ini_set('error_log','/xampp/htdocs/project/php-error.log');
    error_log('Inico de aplicacion Web');
?>


<!-- INGRESO DE USUARIOS -->

<?php 
    require 'conexion.php';///MUESTRA SI LA CONEXION ES CORRECTA     
    if (isset($_POST['login'])) {  ///SI SE LLEGA A PRESIONAR EL INPUT VA A DAR UNA ADVERTENCIA PARA QUE SE LLENEN LOS CAMPOS
        if(strlen($_POST['usuario'])>= 1 && strlen($_POST['contrasena']) > 1) {
            
            ///DECLARO MIS VARIABLES PARA LLAMARLAS A TRAVES DE UNA CONSULTA DE MYSQL 
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            session_start();
            $_SESSION['usuario']=$usuario;
            $sql = $conn->query(" SELECT * FROM usuario WHERE usuario = '$usuario' and contrasena = '$contrasena' ");
            if (mysqli_num_rows($sql) > 0) {   ///SI MIS DATOS INGRESADOS A TRAVES DEL METODO POST COINCIDEN CON LOS DATOS DE MI BASE DE DATOS ME LLEVARA A HOME.PHP
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>;
                <script>
                        Swal.fire({
                        icon: 'success',
                        title: '¡Bienvenido a GestDocX!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = '../paginas/verdocs.php';
                    })
                </script>          
                <?php
            } else{ ///SI NO COINCIDEN SALDRA UN MENSAJE DE ACCESO DENEGADO
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>;
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Credenciales no coinciden!',
                    })
                </script>                
                <?php
            }

    }else {
        ?>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>;
        <script>
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Campos vacios!',
             })
        </script>                
        <?php
         }
}    
     

   
     

   
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="http://localhost/proyecto_final/assets/css/estilologin.css">
    <link rel="stylesheet" href="C:/xampp/htdocs/proyecto_final/assets/css/estilologin.css">
    <style type="text/css">
    
    
    </style>
</head>
<body>
    
    <!-- CONTENENDOR DEL FORMULARIO DE INICIO DE SESION-->
    <div class="loginphp">
        <!-- Se va a procesar en login.php y se enviará por POST, no por GET-->
        <img class="avatar" src="http://localhost/proyecto_final/img/logo.png" alt="Logo de DocFyles">
        
        <h1>Bienvenidos</h1>
        <form action="" method="post">
            <!--
                Nota: el atributo name es importante, pues lo vamos a recibir de esa manera
                en PHP
            -->
            <!--INGRESO DE USUARIO-->
            <label for="login-email"><b>Usuario:</b> </label>         
            <input id="usuario" name="usuario" type="text">
            <br><br>
            <!--INGRESO DE CONTRASEÑA-->
            <label for="login-password"><b>Contraseña:</b></label>        
            <input id="password" name="contrasena" type="password">
            <!--<button class="show" type="button" onclick="mostrarContrasena()"> <img src="http://localhost/project/img/show.png" height="30" width="30"></button>
            -->
            <br><br>
            <input type="submit" name="login" value="Iniciar sesion" >
            <a href="register.php">Registrarse</a> <br>
        </form>
    </div>
    
</body>
</html>



<!--Script para mostrar contraseña -->
<!--<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>-->
