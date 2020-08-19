<?php 

class RegistrosDao{

	public function createRegistro($nombres, $apellidos, $edad, $id_genero, $correo, $id_especialidad, $id_seccion){

		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "insert into registro(nombres,apellidos,edad,id_genero,correo,id_especialidad,id_seccion) values(:nombres,:apellidos,:edad,:id_genero,:correo,:id_especialidad,:id_seccion)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(":nombres",$nombres);
		$statement->bindParam(":apellidos",$apellidos);
		$statement->bindParam(":edad",$edad);
		$statement->bindParam(":id_genero",$id_genero);
		$statement->bindParam(":correo",$correo);
		$statement->bindParam(":id_especialidad",$id_especialidad);
		$statement->bindParam(":id_seccion",$id_seccion);

		$statement->execute();

	}

	public function findAll(){

		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select r.id_registro, r.nombres, r.apellidos, r.edad, g.genero, r.correo, e.especialidad, s.seccion from registro r inner join genero g on g.id_genero = r.id_genero inner join especialidad e on e.id_especialidad = r.id_especialidad inner join seccion s on s.id_seccion = r.id_seccion order by id_registro";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while($result = $statement->fetch()){

			$rows[] = $result;

		}

		return $rows;

	}

	public function deleteRegistro($id_registro){

		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "delete from registro where id_registro = :id_registro";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(":id_registro", $id_registro);

		$statement->execute();

	}

	public function findById($id_registro){

		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select * from registro where id_registro = :id_registro";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(":id_registro", $id_registro);
		$statement->execute();

		while($result = $statement->fetch()) {

			$rows[] = $result;

		}

		return $rows;

	}

	public function updateRegistro($campo, $valor, $id_registro){

		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "update registro set $campo = :valor where id_registro = :id_registro";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(":valor", $valor);
		$statement->bindParam(":id_registro", $id_registro);
		
		$statement->execute();

	}

}

 ?>