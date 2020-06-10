<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./main.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
   
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand">Hello Friend</span>
        <section>
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle show-residents link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="reporte-de-terminadas.php">Residencias Terminadas</a>
                    <a class="dropdown-item" href="reporte-x-informatica.php">Residencias de Informatica</a>
                    <a class="dropdown-item" href="reporte-x-tics.php">Residencias de Tics</a>
                    <a class="dropdown-item" href="reporte-x-sistemas.php">Residencias de Sistemas</a>
                </div>
            </div>
            <a class="btn btn-outline-light" href="maestros.php">Ver Maestros</a>
            <a class="btn btn-outline-light" href="alumnos.php">Ver Alumnos</a>
            <a class="btn btn-outline-light" href="empresas.php">Ver Empresas</a>
            <a class="btn btn-outline-light show-residents link" href="residencias.php">Ver Residencias</a>
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Graficas
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="sector.php">Sector</a>
                    <a class="dropdown-item" href="region.php">Region</a>
                </div>
            </div>
        </section>
        <a class="btn btn-success " href="index.html">log out</a>
    </nav>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
        function getParam(param) {
            var url_string = window.location.href;
            var url = new URL(url_string)
            return url.searchParams.get(param);
        }
        var userType = getParam("user-type");
        debugger
        if(userType && userType === 'general') {
            localStorage.setItem('admin', false);
        } else if(userType)localStorage.setItem('admin', true);
        const isAdmin = localStorage.getItem('admin');
        
        if(!isAdmin || isAdmin == 'false') {
            var addResidentsLink = document.querySelectorAll('.show-residents.link');
            for(let i=0;i<addResidentsLink.length;i++) {
                addResidentsLink[i].style.display = 'none'
            }
        } else {
            
        }
    </script>