<?php 

require_once 'model/Conexion.php';
require_once 'model/RegistrosDao.php';
require_once 'model/GeneroDao.php';
require_once 'model/EspecialidadDao.php';
require_once 'model/SeccionDao.php';

 ?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Actualizar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="icon/icon.css">
	<script src="js/jquery-3.5.1.js" type="text/javascript"></script>
	<script src="js/popper.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>

	<header>

		<div class="jumbotron rounded-0 d-flex flex-wrap justify-content-center bg-success">

			<h1 class="display-4 text-light text-center w-100">Actualizacion de Nomina</h1>
			<a href="index.php" class="btn btn-sm btn-outline-light mt-3 pl-5 pr-5 pt-1 pb-1">
				Ver Alumnos Inscritos
			</a>
			
		</div>
		
	</header>

	<section>

		<div class="container mb-3">
			
			<div class="card">

				<div class="card-header">
					<h6 class="card-title text-center">Rellene todos los campos</h6>
				</div>

				<?php 
				if(isset($_GET['id_registro'])) { 

					$id_registro = $_GET['id_registro'];
					$dao = new RegistrosDao();
					$filas = $dao->findById($id_registro); 

					foreach($filas as $f) { ?>

					<form action="controller/updateRegistro.php" method="POST">

						<input type="hidden" name="id_registro" value="<?= $f['id_registro'] ?>" placeholder="">

						<div class="card-body">
						
						<div class="row">
							<div class="form-group col-6">
								<label>Introduce tus Nombres:</label>
								<input type="text" name="nombres" value="<?= $f['nombres'] ?>" class="form-control form-control-sm">				
							</div>

							<div class="form-group col-6">
								<label>Introduce tus Apellidos:</label>
								<input type="text" name="apellidos" value="<?= $f['apellidos'] ?>" class="form-control form-control-sm">	
							</div>
						</div>

						<div class="row">
							<div class="form-group col-3">
								<label>Edad:</label>
								<input type="text" name="edad" value="<?= $f['edad'] ?>" class="form-control form-control-sm">
							</div>
							<div class="form-group col-3">
								<label>Genero:</label>
								<select name="genero" class="custom-select custom-select-sm">
									<option>Seleccione...</option>}

									<?php 
									$dao = new GeneroDao();
									$generos = $dao->findAll();
									foreach($generos as $gen) { 
										
										if ($gen['id_genero'] == $f['id_genero']) { ?>

											<option value="<?= $gen['id_genero'] ?>" selected="">
												<?= $gen['genero'] ?>
											</option>

										<?php } else { ?>

											<option value="<?= $gen['id_genero'] ?>">
												<?= $gen['genero'] ?>
											</option>

										<?php } ?>

									<?php } ?>
									
								</select>
							</div>
							<div class="form-group col-6">
								<label>Correo Electronico:</label>
								<input type="text" name="correo" value="<?= $f['correo'] ?>" class="form-control form-control-sm">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-6">
								<label>Especialidad:</label>
								<select name="especialidad" class="custom-select custom-select-sm">
									<option>Seleccione...</option>

									<?php 
									$dao = new EspecialidadDao();
									$especialidad = $dao->findAll();

									foreach($especialidad as $esp){ 

										if($esp['id_especialidad'] == $f['id_especialidad']) { ?>

											<option value="<?= $esp['id_especialidad'] ?>" selected="">
												<?= $esp['especialidad'] ?>
											</option>

										<?php } else { ?>

											<option value="<?= $esp['id_especialidad'] ?>">
												<?= $esp['especialidad'] ?>
											</option>

										<?php } ?>

									<?php } ?>
									
								</select>
							</div>
							<div class="form-group col-3">
								<label>Seccion:</label>
								<select name="seccion" class="custom-select custom-select-sm">
									<option>Seleccione...</option>

									<?php 
									$dao = new SeccionDao();
									$seccion = $dao->findAll();

									foreach($seccion as $sec){ 

										if($sec['id_seccion'] == $f['id_seccion']) { ?>

											<option value="<?= $sec['id_seccion'] ?>" selected="">
												<?= $sec['seccion'] ?>
											</option>

										<?php } else { ?>

											<option value="<?= $sec['id_seccion'] ?>">
												<?= $sec['seccion'] ?>
											</option>

										<?php } ?>

									<?php } ?>
									
								</select>
							</div>
						</div>

						</div>
						<div class="card-footer d-flex justify-content-center">
							<input type="submit" class="btn btn-success btn-sm" value="Actualizar Datos"></input>
							<a href="index.php" class="btn btn-danger btn-sm ml-3">Cancelar</a>
						</div>
					
					</form>

					<?php } ?>

				<?php } ?>
				
			</div>

		</div>
		
	</section>

	<footer>
		
	</footer>

</body>

</html>