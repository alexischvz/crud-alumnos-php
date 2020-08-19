<?php 

require_once 'model/Conexion.php';
require_once 'model/RegistrosDao.php';
require_once 'controller/readAlumnos.php';

 ?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="icon/icon.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
</head>

<body>

	<header>

		<div class="jumbotron rounded-0 bg-info d-flex flex-wrap justify-content-center">
			
			<h1 class="display-4 text-center text-light w-100">Nomina de Inscritos</h1>
			<a href="inscripcion.php" class="btn btn-outline-light btn-sm mt-3 pl-5 pr-5 pt-1 pb-1">
				Inscribir Nuevo Alumno
			</a>

		</div>
		
	</header>

	<section>

		<div class="container pl-0 pr-0">

			<div class="row">
				<h5 class="text-dark text-center w-100 mb-5 mt-3">Alumnos Inscritos</h5>
			</div>

			<table class="table table-hover table-sm">

				<thead class="bg-info text-light">
					<tr>
						<th>Id</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Edad</th>
						<th>Genero</th>
						<th>Correo</th>
						<th>Especialidad</th>
						<th>Seccion</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					
					<?php 

					foreach ($registro as $reg) { ?>

						<tr>
							<td><?= $reg['id_registro'] ?></td>
							<td><?= $reg['nombres'] ?></td>
							<td><?= $reg['apellidos'] ?></td>
							<td><?= $reg['edad'] ?></td>
							<td><?= $reg['genero'] ?></td>
							<td><?= $reg['correo'] ?></td>
							<td><?= $reg['especialidad'] ?></td>
							<td><?= $reg['seccion'] ?></td>
							<td>
								<a href="#" onclick="del(<?= $reg['id_registro'] ?>)" class="btn btn-sm btn-outline-danger icon-bin"></a>
								<a href="modificar.php?id_registro=<?= $reg['id_registro'] ?>" class="btn btn-sm btn-outline-info icon-pencil"></a>
							</td>
						</tr>
						
					<?php  } ?>

				</tbody>
				
			</table>
			
		</div>
		
	</section>

	<footer>
		
	</footer>

	<script src="js/jquery-3.5.1.js" type="text/javascript"></script>
	<script src="js/popper.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/alertify.js" type="text/javascript"></script>

	<script>
		function del(id_r){

			alertify.confirm('Eliminar Registro', 'Estas seguro de eliminar el registro?', 
				function(){ 
					window.location = "controller/deleteRegistro.php?id_registro="+id_r;
				},
				function(){ 
					alertify.error('Cancelado')
				});

		}
	</script>

</body>

</html>