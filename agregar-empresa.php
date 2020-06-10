<?php include_once("components/header.php"); ?>
<main class="container margin-1-rem">
    <section class="margin-1-rem">
        <div class="row">
            <div class="col-8">
                <h3 >Agregar datos de empresa</h3>
            </div>
            <div class="col-4">
                <a class="btn btn-success" href="home.php">Regresar a menu principal</a>
            </div>
        </div>
    </section>
    <?php
        require_once "conexion.php";
        if(isset($_POST['save'])){
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $control = $_POST['codigo_postal'];

            $stmt = $conn->prepare("INSERT INTO empresas (nombre, direccion, codigo_postal) VALUES(?, ?, ?)");
            $stmt->bind_param("sss",$nombre, $direccion, $control);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
            }
        }
    ?>
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nombre</label>
            <input required="required" type="text" class="form-control" name="nombre" placeholder="Ingrese los nombre(s) del empresa">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">direccion</label>
            <input required="required" type="text" class="form-control" name="direccion" placeholder="Ingrese los direccion del empresa">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Codigo postal</label>
            <input required="required" type="text" class="form-control" name="codigo_postal" placeholder="Ingrese el codigo postal">
        </div>
        <button type="submit" name="save" class="btn btn-primary">Guardar Datos</button>
        <!-- <a class="btn btn-success " href="home.html">Regresar a menu principal</a> -->
    </form>
</main>
<?php include_once("components/footer.php"); ?>