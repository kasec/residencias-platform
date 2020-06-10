<?php
header("Content-Type: text/html; charset=UTF-8");
require('fpdf181/fpdf.php');

class PDF extends FPDF {

	function Header() {
		
		//Colores de los bordes, fondo y texto
		
		$this->SetTextColor(0,80,180);
		//Ancho del borde (1 mm)
		
		//Titulo
		
		//salto de linea
		$this->Ln(20);

		//Logo
		//Arial bold 15
		$this->SetFont('Arial','B',20);
		//Movernos a la derecha
		$this->Cell(70);
		//Titulo
		$this->Cell(60,10, 'REPORTE DE RESIDENCIAS: Terminados',0,0,'c');
		//salto de linea
		$this->Ln(17);
	}

	// Pie de pagina
	function Footer() {
		//Posicion: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',15);
		// Numero de pagina
		$this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
	}

	function cargarDatos() {
		require_once 'conexion.php';
		$query=" SELECT * FROM residencias WHERE estado_residencia='terminado'";

		$result = $conn->query($query) or die($conn->$error.__LINE__);

		//Colores, ancho de linea y fuente en negrita
		$this->SetFillColor(0,80,180);
		$this->SetTextColor(255);
		$this->SetDrawColor(0,80,180);
		
		$this->SetFont('Arial','B',15);
		$this->Ln();
	
		//Anchuras de las columnas
		$w = array(60,60,50,50,50,50,30,60,25,25);
		//Titulos de las columnas
		
		$titulosColumnas = array('Alumno', 'Maestro', 'Empresa', 'Periodo', 'Estado','Carrera','Proyecto','Objetivo',
			'Sector','Region');
		for($i=0;$i<count($titulosColumnas);$i++)
			$this->Cell($w[$i],12,$titulosColumnas[$i],1,0,'c',true);
		$this->Ln();
		//Restauracion de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('Arial','',12);
		//Datos
		$fill = false;
		if($result->num_rows > 0) {
			while($col = $result->fetch_assoc()) {
				$this->Cell($w[0],6,$col["nom_alumno"],'LR',0,'L',$fill);
				$this->Cell($w[1],6,$col["nom_maestro"],'LR',0,'L',$fill);
				$this->Cell($w[2],6,$col["nom_empresa"],'LR',0,'L',$fill);
				$this->Cell($w[3],6,$col["periodo"],'LR',0,'L',$fill);
				$this->Cell($w[4],6,$col["estado_residencia"],'LR',0,'L',$fill);
				$this->Cell($w[5],6,$col["carrera"],'LR',0,'L',$fill);
				$this->Cell($w[6],6,$col["nom_proyecto"],'LR',0,'L',$fill);
				$this->Cell($w[7],6,$col["objetivo"],'LR',0,'L',$fill);
				$this->Cell($w[8],6,$col["sector"],'LR',0,'L',$fill);
				$this->Cell($w[9],6,$col["region"],'LR',0,'L',$fill);
				$this->Ln();
				$fill = !$fill;
			}
		//Linea de cierre
			$this->Cell(array_sum($w),0,'','T');
		}
	}
}
//Creacion del ojeto de la clase heredada
ob_start();
$pdf = new PDF('L','mm',array(400,580));

$title = 'Residencias APP';
$pdf->SetTitle($title);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->cargarDatos();
$pdf->Output();

?>