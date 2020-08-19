<?php 

class EspecialidadDao{

	public function findAll(){

		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select * from especialidad";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while($result = $statement->fetch()) {

			$rows[] = $result;

		}

		return $rows;

	}

}

 ?>