<?php
include("gmc_conexion.php");
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
				header("Location: gmc_who_list.php");
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
				
			?>


			<form class="form-horizontal" action="" method="post">
				<div><?php $nombre ?></div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<a href="gmc_who_list.php" class="btn btn-sm btn-danger">Cancelar</a>
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