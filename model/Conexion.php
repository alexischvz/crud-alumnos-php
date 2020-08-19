<?php 

class Conexion{

	public function getConexion(){

		$user = "root";
		$pass = "";
		$host = "localhost";
		$dbname = "alumnos";

		$conexion = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);

		return $conexion;

	}

}

 ?>