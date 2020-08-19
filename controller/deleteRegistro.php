<?php 

require_once '../model/Conexion.php';
require_once '../model/RegistrosDao.php';

if(isset($_GET['id_registro'])){
	$id_registro = $_GET['id_registro'];
	$dao = new RegistrosDao();
	$dao->deleteRegistro($id_registro);
	header('Location: ../index.php');
}

 ?>