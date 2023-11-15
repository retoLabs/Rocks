<?php
include("ita_conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Usuaris</title>

	<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!--link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet" -->
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
			<h2>Edit persona</h2>
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
			// escaping, additionally removing everything that could be (html/javascript-) code
			$ID = mysqli_real_escape_string($con,(strip_tags($_GET["ID"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM gente WHERE ID=$ID");
			if(mysqli_num_rows($sql) == 0){
				header("Location: ita_who_list.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$ID = mysqli_real_escape_string($con,(strip_tags($_POST["ID"],ENT_QUOTES)));//Escanpando caracteres 
				$nombre	 = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$apellido	 = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));//Escanpando caracteres 
				$nifnie	 = mysqli_real_escape_string($con,(strip_tags($_POST["nifnie"],ENT_QUOTES)));//Escanpando caracteres 
				$direcc	 = mysqli_real_escape_string($con,(strip_tags($_POST["direcc"],ENT_QUOTES)));//Escanpando caracteres 
				$poblac	 = mysqli_real_escape_string($con,(strip_tags($_POST["poblac"],ENT_QUOTES)));//Escanpando caracteres 
				$foto	 = mysqli_real_escape_string($con,(strip_tags($_POST["foto"],ENT_QUOTES)));//Escanpando caracteres 
				
				$update = mysqli_query($con, "UPDATE gente SET nombre='$nombre', apellido='$apellido', nifnie='$nifnie', direcc='$direcc', poblac='$poblac', foto='$foto' WHERE ID='$ID'") or die(mysqli_error());
				if($update){
					header("Location: ita_who_edit.php?ID=".$ID."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>


			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID</label>
					<div class="col-sm-2">
						<input type="text" name="ID" value="<?php echo $row ['ID']; ?>" class="form-control" placeholder="ID" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" value="<?php echo $row ['nombre']; ?>" class="form-control" placeholder="Rol PROP|TECN" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-4">
						<input type="text" name="apellido" value="<?php echo $row ['apellido']; ?>" class="form-control" placeholder="Apellido" required>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">NIF/NIE</label>
					<div class="col-sm-4">
						<input type="text" name="nifnie" value="<?php echo $row ['nifnie']; ?>" class="form-control" placeholder="NIF/NIE" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Direcció</label>
					<div class="col-sm-4">
						<input type="text" name="direcc" value="<?php echo $row ['direcc']; ?>" class="form-control" placeholder="Direcció" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Poblacion</label>
					<div class="col-sm-4">
						<input type="text" name="poblac" value="<?php echo $row ['poblac']; ?>" class="form-control" placeholder="Població" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Foto</label>
					<div class="col-sm-4">
						<input type="text" name="foto" value="<?php echo $row ['foto']; ?>" class="form-control" placeholder="Path foto" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="ita_who_list.php" class="btn btn-sm btn-danger">Cancelar</a>
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