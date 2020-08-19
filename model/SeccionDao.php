<?php 

class SeccionDao{

	public function findAll(){

		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select * from seccion";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while($result = $statement->fetch()) {

			$rows[] = $result;

		}

		return $rows;

	}

}

 ?>