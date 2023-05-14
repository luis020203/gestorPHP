<?php
session_start();
error_reporting(0);
$varsession = $_SESSION['usuario'];
if ($varsession== null || $varsession=''){
    header("location: index.php");
    die();
}
?>

<?php 
include 'C:/xampp/htdocs/project_clone/paginas/menu.php'
?>

<!DOCTYPE html>
<HTml lang="es">

<head>
    <title>INICIO </title>
    <link rel="stylesheet" href="http://localhost/project_clone/assets/css/home.css">
    <link rel="stylesheet" href="C:/xampp/htdocs/project/assets/css/home.css">
    <style type="text/css">
    </style>
</head>

<body>
<div class= "home">
  <main class="opciones">
  <h2>GESTDOCX</h2>
  </main>
  <a href="loadtesis.php"><img class="doc1" src="http://localhost/project_clone/img/registro.png" alt="dato"></a>        
  <a href="loadmemo.php"><img class="doc2" src="http://localhost/project/img/648137.png" alt="dato"></a>
</div>     
</body>
</HTml>

<!--<a href="loadtesis.php"><img class="doc1" src="http://localhost/project_clone/img/registro.png" alt="dato">
            </a>        
            <a href="loadmemo.php"><img class="doc2" src="http://localhost/project/img/648137.png" alt="dato">  
            </a>-->
        