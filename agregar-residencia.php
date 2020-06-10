
<?php include_once("components/header.php"); ?>
<main class="container margin-1-rem">
    <section class="margin-1-rem">
        <div class="row">
            <div class="col-8">
                <h3 >Llenar Formulario de Residente</h3>
            </div>
            <div class="col-4">
                <a class="btn btn-success" href="home.html">Regresar a menu principal</a>
            </div>
        </div>
    </section>
    <?php
        require_once "conexion.php";
        if(isset($_POST['save'])){
            $nom_alumno = $_POST['nom_alumno'];
            $nom_maestro = $_POST['nom_maestro'];
            $nom_empresa = $_POST['nom_empresa'];
            $periodo = $_POST['periodo'];
            $estado_residencia = $_POST['estado_residencia'];
            $carrera = $_POST['carrera'];
            $nom_proyecto = $_POST['nom_proyecto'];
            $objetivo = $_POST['objetivo'];
            $sector = $_POST['sector'];
            $region = $_POST['region'];
            $num_alumnos = $_POST['num_alumnos'];
            $areas = $_POST['areas'];
            $lenguajes = $_POST['lenguajes'];
            $base_datos = $_POST['base_datos'];
            $ideas = $_POST['ideas'];
            $frames = $_POST['frames'];


            $stmt = $conn->prepare("INSERT INTO residencias (nom_alumno, nom_maestro, nom_empresa, periodo, estado_residencia,
                carrera, nom_proyecto, objetivo, sector, region, num_alumnos, areas, lenguajes, base_datos, ideas, frames) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssssssss",$nom_alumno, $nom_maestro, $nom_empresa, $periodo, $estado_residencia,
            $carrera, $nom_proyecto, $objetivo, $sector, $region, $num_alumnos, $areas, $lenguajes, $base_datos, $ideas, $frames);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
            }


        }
        $query_alumnos = mysqli_query($conn, "SELECT * FROM alumnos ORDER BY id ASC");
        $query_periodos = mysqli_query($conn, "SELECT * FROM periodos ORDER BY id ASC");
        $query_maestros = mysqli_query($conn, "SELECT * FROM maestros ORDER BY id ASC");
        $query_empresas = mysqli_query($conn, "SELECT * FROM empresas ORDER BY id ASC");
    ?>
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Alumnos</label>
            <select class="form-control" name="nom_alumno">
                <option value="">Seleccionar Alumno</option>
                <?php
                    if(mysqli_num_rows($query_alumnos) == 0){
                        echo '<option>no hay alumnos</option>';
                    }
                    else {
                        while($alumno = mysqli_fetch_assoc($query_alumnos)) {
                            echo '<option value="'.$alumno['nombres']. ' '. $alumno['apellidos'].'">'.$alumno['nombres']. ' '. $alumno['apellidos'].'</option>';
                        }
                    }
                ?>
                </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Periodos</label>
            <select name="periodo" class="form-control">
                <option value="">Seleccionar un periodo</option>
                <?php
                    if(mysqli_num_rows($query_periodos) == 0){
                        echo '<option>no hay periodos agregados</option>';
                    }
                    else {
                        while($periodo = mysqli_fetch_assoc($query_periodos)) {
                            echo '<option value="'.$periodo['nombre'].'">'.$periodo['nombre'].'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Asesor</label>
            <select name="nom_maestro" class="form-control">
                <option value="">Seleccionar un asesor</option>
                <?php
                    if(mysqli_num_rows($query_maestros) == 0){
                        echo '<option>no hay maestros</option>';
                    }
                    else {
                        while($maestro = mysqli_fetch_assoc($query_maestros)) {
                            echo '<option value="'.$maestro['nombres']. ' '. $maestro['apellidos'].'">'.$maestro['nombres']. ' '. $maestro['apellidos'].'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Carrera</label>
            <select name="carrera" class="form-control">
                <option value="">Seleccionar la carrera</option>
                <option value="TICs">TICs</option>
                <option value="Informatica">Informatica</option>
                <option value="Sistemas">Sistemas</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nombre del Proyecto</label>
            <input name="nom_proyecto" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el nombre del proyecto">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Empresa</label>
            <select name="nom_empresa" class="form-control">
                <option value="">Seleccionar una empresa</option>
                <?php
                    if(mysqli_num_rows($query_empresas) == 0){
                        echo '<option>no hay empresas</option>';
                    }
                    else {
                        while($empresa = mysqli_fetch_assoc($query_empresas)) {
                            echo '<option value="'.$empresa['nombre'].'">'.$empresa['nombre'].'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Objetivo del Proyecto</label>
            <textarea name="objetivo" placeholder="Agregar objetivo de proyecto" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Sector</label>
            <div class="form-check">
                <input name="sector" class="form-check-input" type="radio" value="privado" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Privado
                </label>
            </div>
            <div class="form-check">
                <input name="sector" class="form-check-input" type="radio" value="publico" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Publico
                </label>
            </div>
            </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Region</label>
            <div class="form-check">
                <input name="region" class="form-check-input" type="radio" value="privado" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Privado
                </label>
            </div>
            <div class="form-check">
                <input name="region" class="form-check-input" type="radio" value="publico" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Publico
                </label>
            </div>
            </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Areas de aplicacion</label>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Tecnologia Web" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Tecnologia Web
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Moviles" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Moviles
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Video Juegos" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Video Juegos
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Redes" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Redes
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Seguridad" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Seguridad
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Base de Datos" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Base de Datos
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Sistemas de Escritorio" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Sistemas de Escritorio
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Multimedia" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Multimedia
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Arduinos" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Arduinos
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Usabilidad" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Usabilidad
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Doc. de Sistemas" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Doc. de Sistemas
                </label>
            </div>
            <div class="form-check">
                <input name="areas" class="form-check-input" type="checkbox" value="Doc. de red" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Doc. de red
                </label>
            </div>
            </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Numero de Alumnos Asignados al Proyecto</label>
            <div class="form-check">
                <input name="num_alumnos" class="form-check-input" type="radio" value="1" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    1
                </label>
            </div>
            <div class="form-check">
                <input name="num_alumnos" class="form-check-input" type="radio" value="2" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    2
                </label>
            </div>
            <div class="form-check">
                <input name="num_alumnos" class="form-check-input" type="radio" value="3" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    3
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Lenguajes de programacion que usara el alumno</label>
            <div class="form-check">
                <input name="lenguajes" class="form-check-input" type="checkbox" value="PHP" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    PHP
                </label>
            </div>
            <div class="form-check">
                <input name="lenguajes" class="form-check-input" type="checkbox" value="Java" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Java
                </label>
            </div>
            <div class="form-check">
                <input name="lenguajes" class="form-check-input" type="checkbox" value="Javascript" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Javascript
                </label>
            </div>
            <div class="form-check">
                <input name="lenguajes" class="form-check-input" type="checkbox" value="Typescript" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Typescript
                </label>
            </div>
            <div class="form-check">
                <input name="lenguajes" class="form-check-input" type="checkbox" value="C#" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    C#
                </label>
            </div>
            <div class="form-check">
                <input name="lenguajes" class="form-check-input" type="checkbox" value="Python" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Python
                </label>
            </div>
            <div class="form-check">
                <input name="lenguajes" class="form-check-input" type="checkbox" value="C++" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    C++
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Base de Datos que usara el alumno</label>
            <div class="form-check">
                <input name="base_datos" class="form-check-input" type="checkbox" value="MySQL" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    MySQL
                </label>
            </div>
            <div class="form-check">
                <input name="base_datos" class="form-check-input" type="checkbox" value="SQLServer" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    SQLServer
                </label>
            </div>
            <div class="form-check">
                <input name="base_datos" class="form-check-input" type="checkbox" value="Oracle" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Oracle
                </label>
            </div>
            <div class="form-check">
                <input name="base_datos" class="form-check-input" type="checkbox" value="MongoDB" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    MongoDB
                </label>
            </div>
            <div class="form-check">
                <input name="base_datos" class="form-check-input" type="checkbox" value="PostgreSQL" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    PostgreSQL
                </label>
            </div>
            <div class="form-check">
                <input name="base_datos" class="form-check-input" type="checkbox" value="Firebase" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Firebase
                </label>
            </div>
            <div class="form-check">
                <input name="base_datos" class="form-check-input" type="checkbox" value="Sybase" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Sybase
                </label>
            </div>
            <div class="form-check">
                <input name="base_datos" class="form-check-input" type="checkbox" value="SQLite" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    SQLite
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Entornos Integrados de Desarrollo que usara el Alumno</label>
            <div class="form-check">
                <input name="ideas" class="form-check-input" type="checkbox" value="Sublime" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Sublime
                </label>
            </div>
            <div class="form-check">
                <input name="ideas" class="form-check-input" type="checkbox" value="NetBeans" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    NetBeans
                </label>
            </div>
            <div class="form-check">
                <input name="ideas" class="form-check-input" type="checkbox" value="Eclipse" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Eclipse
                </label>
            </div>
            <div class="form-check">
                <input name="ideas" class="form-check-input" type="checkbox" value="Visual Studio" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Visual Studio
                </label>
            </div>
            <div class="form-check">
                <input name="ideas" class="form-check-input" type="checkbox" value="Visual Code" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Visual Code
                </label>
            </div>
            <div class="form-check">
                <input name="ideas" class="form-check-input" type="checkbox" value="Android Studio" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Android Studio
                </label>
            </div>
            <div class="form-check">
                <input name="ideas"class="form-check-input" type="checkbox" value="IDE Arduino" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    IDE Arduino
                </label>
            </div>
            <div class="form-check">
                <input name="ideas" class="form-check-input" type="checkbox" value="Atom" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Atom
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Frameworks de desarrollo que usara el alumno</label>
            <div class="form-check">
                <input name="frames" class="form-check-input" type="checkbox" value="Angular JS" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Angular JS
                </label>
            </div>
            <div class="form-check">
                <input name="frames" class="form-check-input" type="checkbox" value="DJANGO" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    DJANGO
                </label>
            </div>
            <div class="form-check">
                <input name="frames" class="form-check-input" type="checkbox" value="Laravel" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Laravel
                </label>
            </div>
            <div class="form-check">
                <input name="frames" class="form-check-input" type="checkbox" value="Symfony" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Symfony
                </label>
            </div>
            <div class="form-check">
                <input name="frames" class="form-check-input" type="checkbox" value="Ruby on Rails" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Ruby on Rails
                </label>
            </div>
            <div class="form-check">
                <input name="frames" class="form-check-input" type="checkbox" value="React" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    React
                </label>
            </div>
            <div class="form-check">
                <input name="frames" class="form-check-input" type="checkbox" value="Ionic" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    Ionic
                </label>
            </div>
            <div class="form-check">
                <input name="frames" class="form-check-input" type="checkbox" value="ASP .NET" id="defaultCheck2">
                <label class="form-check-label" for="exampleRadios2">
                    ASP .NET
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Estatus de Residencia</label>
            <select name="estado_residencia" class="form-control">
                <option value="en proceso">En Proceso</option>
            </select>
        </div>
        <button type="submit" name="save" class="btn btn-primary">Guardar Datos</button>
        <a class="btn btn-success " href="home.html">Regresar a menu principal</a>
    </form>
</main>
<?php include_once("components/footer.php"); ?>