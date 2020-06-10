
<?php
require_once "conexion.php";
include_once("components/header.php");
$stmt=$conn->prepare("SELECT region , count(id) as total1 FROM residencias WHERE region='publico'");
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows===0) exit ('No hay registros en la base de datos');

$stmt2=$conn->prepare("SELECT region , count(id) as total2 FROM residencias WHERE region='privado'");
$stmt2->execute();
$result2 = $stmt2->get_result();
if($result2->num_rows===0) exit ('No hay registros en la base de datos');

?>


	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


input[type="number"] {
	min-width: 50px;
}
		</style>
	</head>
	<body>
<script src="Highcharts-8.1.0/code/highcharts.js"></script>
<script src="Highcharts-8.1.0/code/highcharts-3d.js"></script>
<script src="Highcharts-8.1.0/code/highcharts-more.js"></script>
<script src="Highcharts-8.1.0/code/modules/exporting.js"></script>
<script src="Highcharts-8.1.0/code/modules/export-data.js"></script>
<script src="Highcharts-8.1.0/code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        En la gráfica se muestran los porcentajes de Alumnos que pertenecen a region publico y privado en los cuales estan realizando su estancia de residencia.
    </p>
</figure>



		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'ESTADISTICAS DE RESIDENCIAS POR region'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        type:'pie',
        name: 'Residencias',
        colorByPoint: true,
        data: [

           <?php
            while($row=$result->fetch_array()){
                echo"['".$row["region"]."',".$row["total1"]."],";
            }
          ?> 

          <?php
            while($row2=$result2->fetch_array()){
                echo"['".$row2["region"]."',".$row2["total2"]."],";
            }
          ?>  

          ]
    }]
    
   });

     
		</script>
	</body>