<?php 

require_once '../model/Conexion.php';
require_once '../model/RegistrosDao.php';

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$correo = $_POST['correo'];
$especialidad = $_POST['especialidad'];
$seccion = $_POST['seccion'];

$dao = new RegistrosDao();
$dao->createRegistro($nombres, $apellidos, $edad, $genero, $correo, $especialidad, $seccion);
header('Location: ../index.php');

 ?>