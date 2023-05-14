<?php

include 'C:/xampp/htdocs/proyecto_final/paginas/conexion.php';

//INSETAR CATEGORIAS
function insertar_tipo($conn, $tipo,$usuario){
    $sql_insert_tipo = "INSERT INTO tipo_archivo(tipo_archivo) Values ('$tipo')";
    $sql_tipo = mysqli_query($conn, $sql_insert_tipo);
    $id_categoria = mysqli_insert_id($conn); // Recuperar id de la categoria

    $sql_select_user = "SELECT id FROM usuario WHERE usuario = '$usuario'";
    $resultado_select_user = mysqli_query($conn, $sql_select_user);
    $registro_select_user = mysqli_fetch_assoc($resultado_select_user);
    $id_usuario = intval($registro_select_user['id']); //Recuperar id del usuario

    $sql_insert_gestionar = "INSERT INTO gestionar_usuario_categoria (id_categoria, id_usuario) VALUES ('$id_categoria', '$id_usuario')";
    $insert_gestionar = mysqli_query($conn, $sql_insert_gestionar); // Guardar registro en la tabla maestra gestionar_usuario_archivo

    return $insert_archivo.$insert_gestionar;
}

//MOSTRAR CATEGORIAS
function listar_categoria($conn){

    $usuario = $_SESSION['usuario'];
    $sql_select_user = "SELECT id FROM usuario WHERE usuario = '$usuario' ";
    $resultado_select_user = mysqli_query($conn, $sql_select_user);
    $registro_select_user = mysqli_fetch_assoc($resultado_select_user);
    $id_usuario = intval($registro_select_user['id']); //Recuperar id del usuario
    
    $sql = "SELECT * FROM gestionar_usuario_categoria
    right join usuario on gestionar_usuario_categoria.id_usuario = usuario.id
    join tipo_archivo on gestionar_usuario_categoria.id_categoria = tipo_archivo.id
    where usuario.id = '$id_usuario'";
    $query = mysqli_query($conn, $sql);
    return $query; // Ver tabla con registros de la tabla categoria
}


//INSERTAR ARCHIVOS
function insertar($conn, $categoria, $nombre, $fecha, $ruta, $tipo, $usuario, $tipo_archivo){
    $sql_insert_archivo = "INSERT INTO archivo (categoria, nombre, fecha, ruta, tipo, clase_archivo) Values ('$categoria','$nombre', '$fecha', '$ruta', '$tipo', '$tipo_archivo')";
    $insert_archivo = mysqli_query($conn ,$sql_insert_archivo); // Guardar registro en la tabla archivo

    $id_documento = mysqli_insert_id($conn); // Recuperar id del documento

    $sql_select_user = "SELECT id FROM usuario WHERE usuario = '$usuario'";
    $resultado_select_user = mysqli_query($conn, $sql_select_user);
    $registro_select_user = mysqli_fetch_assoc($resultado_select_user);
    $id_usuario = intval($registro_select_user['id']); //Recuperar id del usuario

    $sql_insert_gestionar = "INSERT INTO gestionar_usuario_archivo (id_archivo, id_usuario) VALUES ('$id_documento', '$id_usuario')";
    $insert_gestionar = mysqli_query($conn, $sql_insert_gestionar); // Guardar registro en la tabla maestra gestionar_usuario_archivo

    return $insert_archivo.$insert_gestionar;
}

//Muestra los registros de los documentos subidos por el usuario
function listar($conn){
    $id_documento = mysqli_insert_id($conn); // Recuperar id del documento

    $usuario = $_SESSION['usuario'];
    $sql_select_user = "SELECT id FROM usuario WHERE usuario = '$usuario' ";
    $resultado_select_user = mysqli_query($conn, $sql_select_user);
    $registro_select_user = mysqli_fetch_assoc($resultado_select_user);
    $id_usuario = intval($registro_select_user['id']); //Recuperar id del usuario
    
    $sql = "SELECT archivo.id, categoria, nombre, fecha, tipo, usuario, clase_archivo FROM gestionar_usuario_archivo
    right join usuario on gestionar_usuario_archivo.id_usuario = usuario.id
    join archivo on gestionar_usuario_archivo.id_archivo = archivo.id
    where usuario.id = '$id_usuario'";
    $query = mysqli_query($conn, $sql);
    return $query; // Ver tabla con registros de la tabla archivo
}

//Muestra los registros de los documentos subidos por el usuario
function compartido($conn){
    $sql = "SELECT archivo.id, categoria, nombre, fecha, tipo, usuario, clase_archivo FROM gestionar_usuario_archivo
    right join usuario on gestionar_usuario_archivo.id_usuario = usuario.id
    join archivo on gestionar_usuario_archivo.id_archivo = archivo.id";
    $query = mysqli_query($conn, $sql);
    return $query; // Ver tabla con registros compartidos
} 
function eliminar($conn, $id){
    $sql = "DELETE FROM archivo 
    where archivo.id = $id";
    $query = mysqli_query($conn, $sql);
    return $query;
}

function datos($conn,$id){
    $sql="SELECT * FROM archivo WHERE id=$id";
    $query=mysqli_query($conn,$sql);
    $datos=mysqli_fetch_assoc($query);

    return $datos;
}

function eliminar_categoria($conn, $id){
    $sql = "DELETE FROM tipo_archivo 
    where tipo_archivo.id = $id";
    $query = mysqli_query($conn, $sql);
    return $query;
}

function actualizar($conn,$id ,$categoria, $nombre, $fecha, $ruta, $tipo, $tipo_archivo){
    $sql="UPDATE archivo SET nombre='$nombre', categoria='$categoria', tipo='$tipo',fecha='$fecha',ruta='$ruta', clase_archivo='$tipo_archivo' WHERE id=$id";
    $query=mysqli_query($conn,$sql);
    return $query;
}
?>

