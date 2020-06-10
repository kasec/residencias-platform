<?php include_once("components/header.php"); ?>
<main class="container margin-1-rem">
    <section class="margin-1-rem">
        <div class="row">
            <div class="col-8">
                <h3 >Editar datos de empresa</h3>
            </div>
            <div class="col-4">
                <a class="btn btn-success" href="home.php">Regresar a menu principal</a>
            </div>
        </div>
    </section>
    <?php
        require_once "conexion.php";
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($conn,(strip_tags($_GET["nik"],ENT_QUOTES)));
        $sql = mysqli_query($conn, "SELECT * FROM empresas WHERE id='$nik'");
        if(mysqli_num_rows($sql) == 0){
            header("Location: empresas.php");
        } else {
            $row = mysqli_fetch_assoc($sql);
        }
        if(isset($_POST['save'])){
            
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $codigo_postal = $_POST['codigo_postal'];

            $update = mysqli_query($conn, "UPDATE empresas SET nombre='$nombre', direccion='$direccion', codigo_postal='$codigo_postal' WHERE id='$nik'") or die(mysqli_error());
            if($update){
                header("Location: editar-empresa.php?nik=".$nik."&pesan=sukses");
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
            }
        }
        
        if(isset($_GET['pesan']) == 'sukses'){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
        }
    ?>
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nombre(s)</label>
            <input value="<?php echo $row['nombre'];?>" required="required" type="text" class="form-control" name="nombre" placeholder="Ingrese los nombre(s) del empresa">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Apellido(s)</label>
            <input value="<?php echo $row['direccion'];?>" required="required" type="text" class="form-control" name="direccion" placeholder="Ingrese los apellido(s) del empresa">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Numero de control</label>
            <input value="<?php echo $row['codigo_postal'];?>" required="required" type="text" class="form-control" name="codigo_postal" placeholder="Ingrese el numero de control">
        </div>
        <button type="submit" name="save" class="btn btn-primary">Guardar Datos</button>
        <!-- <a class="btn btn-success " href="home.html">Regresar a menu principal</a> -->
    </form>
</main>
<?php include_once("components/footer.php"); ?>