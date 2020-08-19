<?php 

require_once '../model/Conexion.php';
require_once '../model/RegistrosDao.php';

$id_registro = $_POST['id_registro'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$correo = $_POST['correo'];
$especialidad = $_POST['especialidad'];
$seccion = $_POST['seccion'];

if(isset($id_registro)){

	$dao = new RegistrosDao();
	$dao->updateRegistro("nombres", $nombres, $id_registro);
	$dao->updateRegistro("apellidos", $apellidos, $id_registro);
	$dao->updateRegistro("edad", $edad, $id_registro);
	$dao->updateRegistro("id_genero", $genero, $id_registro);
	$dao->updateRegistro("correo", $correo, $id_registro);
	$dao->updateRegistro("id_especialidad", $especialidad, $id_registro);
	$dao->updateRegistro("id_seccion", $seccion, $id_registro);

	header('Location: ../index.php');

}

 ?>