<?php include_once("components/header.php"); ?>
<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maestros</title>
 
	<!-- Bootstrap -->
 
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
 
</head>
<body>
	<div class="container">
		<div class="content">
            <div class="row">
                <div class="col-8">
                    <h3 >Maestros</h3>
                </div>
                <div class="col-4">
                    <a class="btn btn-success" href="agregar-maestro.php">Agregar Maestro</a>
                </div>
            </div>
			<hr />
 
            <?php
			if(isset($_GET['aksi']) == 'delete') {
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($conn,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($conn, "SELECT * FROM maestros WHERE id='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($conn, "DELETE FROM maestros WHERE id='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>
			<br />
			<div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Numero</th>

                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Numero de tarjeta</th>
                        <th>Genero</th>
                        
                        <th>Acciones</th>
                    </tr>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM maestros");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result ->num_rows ==0) {
                        echo '<tr><td colspan="8">No hay datos.</td></tr>';
                    } else {
                        $no = 1;
                        while($row = $result->fetch_array()){
                            echo '
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['nombres'].'</td>
                                <td>'.$row['apellidos'].'</td>
                                <td>'.$row['no_tarjeta'].'</td>
                                <td>'.$row['genero'].'</td>
                                ';
                            echo '
                                <td>
    
                                    <a href="editar-maestro.php?nik='.$row['id'].'" title="Editar datos" class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                    <a href="maestros.php?aksi=delete&nik='.$row['id'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><i data-feather="x-square"></i></a>
                                </td>
                            </tr>
                            ';
                            $no++;
                        }
                    }
                    ?>
                </table>
			</div>
		</div>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>
</html>