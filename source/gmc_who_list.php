<?php
include("gmc_conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Personas</title>

	<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="css/style_nav.css" rel="stylesheet">

	<style>
		.content {
			margin-top: 80px;
		}
	</style>

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include('gmc_who_nav.php');?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Personas</h2>
			<hr />

			<?php
			if(isset($_GET['accion']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$ID = mysqli_real_escape_string($con,(strip_tags($_GET["ID"],ENT_QUOTES)));
				$stmt = mysqli_query($con, "SELECT * FROM gente WHERE ID='$ID'");
				if(mysqli_num_rows($stmt) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM gente WHERE ID='$ID'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>
<!--
	nombre varchar(64),
	apellido varchar(64),
	nifnie varchar(20),
	direcc varchar(255),
	poblac varchar(255),
	foto varchar(255),
-->
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>NIF/NIE</th>
					<th>Direcc</th>
					<th>Poblac</th>
					<th>Foto</th>
				</tr>

				<?php
					$sql = mysqli_query($con, "SELECT * FROM gente ORDER BY ID ASC");
					if(mysqli_num_rows($sql) == 0){
						echo '<tr><td colspan="8">No hay datos.</td></tr>';
					}else{
						while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['ID'].'</td>
							<td>'.$row['nombre'].'</td>
							<td>'.$row['apellido'].'</td>
							<td>'.$row['nifnie'].'</td>
							<td>'.$row['direcc'].'</td>
							<td>'.$row['poblac'].'</td>
							<td>'.$row['foto'].'</td>
							<td>
								<a href="gmc_who_show.php?ID='.$row['ID'].'" title="Mostrar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-view" aria-hidden="true"></span></a>
								<a href="gmc_who_edit.php?ID='.$row['ID'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="gmc_who_list.php?accion=delete&ID='.$row['ID'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombre'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
					}
				}
				?>
			</table>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>