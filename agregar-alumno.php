<?php include_once("components/header.php"); ?>
<main class="container margin-1-rem">
    <section class="margin-1-rem">
        <div class="row">
            <div class="col-8">
                <h3 >Agregar datos de Alumno</h3>
            </div>
            <div class="col-4">
                <a class="btn btn-success" href="home.php">Regresar a menu principal</a>
            </div>
        </div>
    </section>
    <?php
        require_once "conexion.php";
        if(isset($_POST['save'])){
            $nombre = $_POST['nombres'];
            $apellido = $_POST['apellidos'];
            $control = $_POST['no_control'];
            $genero = $_POST['genero'];

            $stmt = $conn->prepare("INSERT INTO alumnos (nombres, apellidos, no_control, genero) VALUES(?, ?, ?, ?)");
            $stmt->bind_param("ssss",$nombre, $apellido, $control, $genero);
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
            <label for="exampleFormControlInput1">Nombre(s)</label>
            <input required="required" type="text" class="form-control" name="nombres" placeholder="Ingrese los nombre(s) del alumno">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Apellido(s)</label>
            <input required="required" type="text" class="form-control" name="apellidos" placeholder="Ingrese los apellido(s) del alumno">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Numero de control</label>
            <input required="required" type="text" class="form-control" name="no_control" placeholder="Ingrese el numero de control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Genero</label>
            <input required="required" type="text" class="form-control" name="genero" placeholder="Escriba su genero">
        </div>
        <button type="submit" name="save" class="btn btn-primary">Guardar Datos</button>
        <!-- <a class="btn btn-success " href="home.html">Regresar a menu principal</a> -->
    </form>
</main>
<?php include_once("components/footer.php"); ?>