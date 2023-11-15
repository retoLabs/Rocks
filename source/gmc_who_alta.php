<?php
include("gmc_conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alta Usuari</title>

	<!-- Bootstrap -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	</nav>
	<div class="container">
		<div class="content">
			<h2>Alta persona</h2>
			<hr />
<!--
	nombre varchar(64),
	apellido varchar(64),
	nifnie varchar(20),
	direcc varchar(255),
	poblac varchar(255),
	foto varchar(255),
-->

			<?php
			if(isset($_POST['add'])){
				$ID = mysqli_real_escape_string($con,(strip_tags($_POST["ID"],ENT_QUOTES))); 
				$nombre	 = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES))); 
				$apellido	 = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES))); 
				$nifnie	 = mysqli_real_escape_string($con,(strip_tags($_POST["nifnie"],ENT_QUOTES))); 
				$direcc	 = mysqli_real_escape_string($con,(strip_tags($_POST["direcc"],ENT_QUOTES))); 
				$poblac	 = mysqli_real_escape_string($con,(strip_tags($_POST["poblac"],ENT_QUOTES))); 
				$foto	 = mysqli_real_escape_string($con,(strip_tags($_POST["foto"],ENT_QUOTES))); 
		

				$stmt = mysqli_query($con, "SELECT * FROM gente WHERE ID='$ID'");
				if(mysqli_num_rows($stmt) == 0){
					$insert = mysqli_query($con, "INSERT INTO gente (ID, nombre, apellido, nifnie, direcc, poblac, foto)
						VALUES('$ID','$nombre', '$apellido', '$nifnie', '$direcc', '$poblac', '$foto')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID</label>
					<div class="col-sm-2">
						<input type="text" name="ID" class="form-control" placeholder="ID" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" class="form-control" placeholder="nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellido</label>
					<div class="col-sm-4">
						<input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">NIF/NIE</label>
					<div class="col-sm-4">
						<input type="text" name="nifnie" class="form-control" placeholder="NIF/NIE" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Direcció</label>
					<div class="col-sm-4">
						<input type="text" name="direcc" class="form-control" placeholder="Direcció" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Població</label>
					<div class="col-sm-4">
						<input type="text" name="poblac" class="form-control" placeholder="Població" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Foto</label>
					<div class="col-sm-4">
						<input type="text" name="foto" class="form-control" placeholder="Foto" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="gmcGente.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!--script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script -->
</body>
</html>