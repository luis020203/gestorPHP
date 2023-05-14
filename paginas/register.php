<!-- REGISTRO DE USUARIOS -->

<?php 
    require 'conexion.php'; ///MUESTRA SI LA CONEXION ES CORRECTA 
    ///SI SE LLEGA A PRESIONAR EL INPUT VA A DAR UNA ADVERTENCIA PARA QUE SE LLENEN LOS CAMPOS
    if (isset($_POST['register'])) {
        ///SI LOS DATOS DEL FORMULARIO ESTAN VACIOS LE PEDIRA QUE INGRESE DATOS
        if (strlen($_POST['usuario'])>= 1 && strlen($_POST['email'])>= 1 && strlen($_POST['contrasena']) > 1){
            $usuario = trim($_POST['usuario']);
            $email = trim($_POST['email']);
            $contrasena = trim($_POST['contrasena']);
            $consulta = "INSERT INTO usuario(usuario,email,contrasena) VALUES ('$usuario','$email','$contrasena')";
            $resultado = mysqli_query($conn,$consulta);
            if ($resultado) {                               ///MUESTRA MENSAJES POSITVOS O NEGATIVOS SOBRE EL REGISTRO
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>;
                <script>
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Usuario registrado',
                    showConfirmButton: false,
                    timer: 1500
                    })
                </script>  
                <?php
            } else {
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>;
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al registrarse!',
                    })
                </script>                
                <?php
            }
        }   else {
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

    } /// LOS DATOS SE GUARDAN DIRECTAMENTE EN LA BASE DE DATOS USUARIOS.
    


   
?>
<!DOCTYPE html>
<html lang="es">


<!--FORMULARIO DE REGISTRO -->
<head>
    <link rel="stylesheet" href="http://localhost/proyecto_final/assets/css/estiloregister.css">
    <link rel="stylesheet" href="C:/xampp/htdocs/proyecto_final/assets/css/estiloregister.css">

</head>

<body>
    <!--CONTENEDEDOR DEL FORMULARIO DE REGISTRO -->
    <div class="register">
        <img class="avatar" src="http://localhost/project_clone/img/logo.png" alt="Logo de DocFyles">

        <h1>Registro de usuarios</h1>
        <form action="register.php" method="post">

            <label for="user"><b>Usuario:</b></label>
            <input type="text"  name="usuario" id="usuario">
            <br><br>
            <label for="email"><b>Email:</b></label>
            <input type="text"  name="email" id="email">
            <br><br>

            <label for="psw"><b>Contraseña:</b></label>
            <input type="password"  name="contrasena" id="psw">
            <!--<button class="show1" type="button" onclick="mostrarContrasena()"><img src="http://localhost/project/img/show.png" height="30" width="30"></button>
            <br><br>-->

            <br><br>
            <input type="submit" name="register" id="register" value="Registrarse" >
            <br><br>
            <a href="index.php">¿Ya tienes cuenta? Inicia sesion</a>
        </form>
        


    <div>
</body>
</html>

<!--Script para mostrar contraseña -->

<!--<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("psw");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>

<script>
  function mostrar(){
      var tipo = document.getElementById("passr");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
-->
