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
			<h2>Edit usuari</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$ID = mysqli_real_escape_string($con,(strip_tags($_GET["ID"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM usuarios WHERE ID=$ID");
			if(mysqli_num_rows($sql) == 0){
				header("Location: ita_usr_list.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$ID = mysqli_real_escape_string($con,(strip_tags($_POST["ID"],ENT_QUOTES)));//Escanpando caracteres 
				$rol	 = mysqli_real_escape_string($con,(strip_tags($_POST["rol"],ENT_QUOTES)));//Escanpando caracteres 
				$usr	 = mysqli_real_escape_string($con,(strip_tags($_POST["usr"],ENT_QUOTES)));//Escanpando caracteres 
				$pwd	 = mysqli_real_escape_string($con,(strip_tags($_POST["pwd"],ENT_QUOTES)));//Escanpando caracteres 
				
				$update = mysqli_query($con, "UPDATE usuarios SET rol='$rol', usr='$usr', pwd='$pwd' WHERE ID='$ID'") or die(mysqli_error());
				if($update){
					header("Location: ita_usr_edit.php?ID=".$ID."&pesan=sukses");
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
						<input type="text" name="ID" value="<?php echo $row ['ID']; ?>" class="form-control" placeholder="Num" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Rol</label>
					<div class="col-sm-4">
						<input type="text" name="rol" value="<?php echo $row ['rol']; ?>" class="form-control" placeholder="Rol PROP|TECN" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Usuario</label>
					<div class="col-sm-4">
						<input type="text" name="usr" value="<?php echo $row ['usr']; ?>" class="form-control" placeholder="Usuario" required>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-4">
						<input type="text" name="pwd" value="<?php echo $row ['pwd']; ?>" class="form-control" placeholder="Password" required>
					</div>
				</div>

				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="ita_usr_list.php" class="btn btn-sm btn-danger">Cancelar</a>
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