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
	<title>residencias</title>
 
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
                    <h3 >Residencias</h3>
                </div>
                <div class="col-4">
                    <a class="btn btn-success" href="agregar-residencia.php">Agregar residencia</a>
                </div>
            </div>
			<hr />
 
            <?php
			if(isset($_GET['aksi']) == 'modify') {
				// escaping, additionally removing everything that could be (html/javascript-) code
                $nik = mysqli_real_escape_string($conn,(strip_tags($_GET["nik"],ENT_QUOTES)));
                $status = mysqli_real_escape_string($conn,(strip_tags($_GET["status"],ENT_QUOTES)));
				
                $update = mysqli_query($conn, "UPDATE residencias SET estado_residencia='$status' WHERE id='$nik'");
                if($update){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> status modificado correctamente.</div>';
                }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                }
            }
            else if(isset($_GET['aksi']) == 'delete') {
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($conn,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($conn, "SELECT * FROM residencias WHERE id='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				} else {
					$delete = mysqli_query($conn, "DELETE FROM residencias WHERE id='$nik'");
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

                        <th>Alumno</th>
                        <th>Asesor</th>
                        <th>Empresa</th>
                        <th>Periodo</th>
                        <th>Carrera</th>
                        <th>Status</th>

                        <th>Acciones</th>
                    </tr>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM residencias");
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
                                <td>'.$row['nom_alumno'].'</td>
                                <td>'.$row['nom_maestro'].'</td>
                                <td>'.$row['nom_empresa'].'</td>
                                <td>'.$row['periodo'].'</td>
                                <td>'.$row['carrera'].'</td>
                                <td>';
                                if($row['estado_residencia'] == 'en proceso'){
                                    echo '<a href="residencias.php?aksi=modify&nik='.$row['id'].'&status=terminado" title="Modificar" onclick="return confirm(\'Esta seguro de cambiar el estatus de este ?\')" class="btn btn-secondary btn-sm">en proceso</a>';
                                }
                                else if ($row['estado_residencia'] == 'terminado' ){
                                    echo '<a href="residencias.php?aksi=modify&nik='.$row['id'].'&status=en proceso" title="Modificar" onclick="return confirm(\'Esta seguro de cambiar el estatus de este ?\')" class="btn btn-primary btn-sm">terminado</a>';
                                }
                                else echo '<span></span>';
                            echo '</td>
                                <td>
                                    <a href="residencias.php?aksi=delete&nik='.$row['id'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ?\')" class="btn btn-danger btn-sm"><i data-feather="x-square"></i></a>
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
