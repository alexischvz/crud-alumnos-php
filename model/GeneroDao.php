<?php 

class GeneroDao{

	public function findAll(){

		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select * from genero";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while($result = $statement->fetch()){

			$rows[] = $result;

		}

		return $rows;

	}

}

 ?>