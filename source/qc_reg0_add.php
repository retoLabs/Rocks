<?php
include("qc_conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : https://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QC Reg 0</title>

	<!-- Bootstrap -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
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
			<h2>Quadern de camp CCPAE &raquo; Alta Reg 0</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$orden = mysqli_real_escape_string($con,(strip_tags($_POST["orden"],ENT_QUOTES)));//Escanpando caracteres 
				$rol	 = mysqli_real_escape_string($con,(strip_tags($_POST["rol"],ENT_QUOTES)));//Escanpando caracteres 
				$nom	 = mysqli_real_escape_string($con,(strip_tags($_POST["nom"],ENT_QUOTES)));//Escanpando caracteres 
				$nif	 = mysqli_real_escape_string($con,(strip_tags($_POST["nif"],ENT_QUOTES)));//Escanpando caracteres 
				$reg	 = mysqli_real_escape_string($con,(strip_tags($_POST["reg"],ENT_QUOTES)));//Escanpando caracteres 
			

				$cek = mysqli_query($con, "SELECT * FROM Reg00 WHERE orden='$orden'");
				if(mysqli_num_rows($cek) == 0){
					$insert = mysqli_query($con, "INSERT INTO Reg00 (orden, rol, nom, nif, reg)
						VALUES('$orden','$rol', '$nom', '$nif', '$reg')") or die(mysqli_error());
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
					<label class="col-sm-3 control-label">Num</label>
					<div class="col-sm-2">
						<input type="text" name="orden" class="form-control" placeholder="Num" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Rol</label>
					<div class="col-sm-4">
						<input type="text" name="rol" class="form-control" placeholder="Rol PROP|TECN" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nom</label>
					<div class="col-sm-4">
						<input type="text" name="nom" class="form-control" placeholder="Nom" required>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">Nif</label>
					<div class="col-sm-4">
						<input type="text" name="nif" class="form-control" placeholder="Nif" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Registre</label>
					<div class="col-sm-4">
						<input type="text" name="reg" class="form-control" placeholder="Num registre" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
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