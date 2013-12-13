<?php
require('pdf/fpdf.php');
require_once '../../model/laboratorio_interface.php';
require_once '../../model/test_input.php';

class PDF extends FPDF{
//Cabecera de página
   function Header()
   {
	$this->SetFont('Arial','B',12);
	//$this->Cell(0,10,'HOJA NRO: '.$this->PageNo().' - {nb}',0,0,'R');
	//$this->Ln(5);
    $this->Cell(0,10,'ETIQUETAS PARA ENVIO DE CORRESPONDENCIA',0,0,'C');
	$this->Ln(1);	
	}
   
   //Pie de página
   function Footer()
   {
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',8);
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Fecha: '.date("d/m/Y"),0,0,'L');
	$this->Cell(0,10,'Pag '.$this->PageNo().' - {nb}',0,0,'R');	
   }
 

   //Tabla Consulta
   function TablaError()
   {	
		$this->ln(20);
		$this->SetFont('Arial','B',20);
		$this->SetTextColor(255,0,0);
		$this->Cell(0,5,'NO HA INGRESADO',0,10,'C');	
		$this->ln(5);
		$this->Cell(0,5,'LABORATORIOS PARA',0,10,'C');
		$this->ln(5);
		$this->Cell(0,5,'ARMAR LAS ETIQUETAS',0,10,'C');
	}  
   
      function TablaConsulta()
   {	
	$this->ln(5);
	$laboratorios = explode(",", $_POST['vals']);
	foreach ($laboratorios as $lab){
		$datos = ORM_laboratorio::buscar_laboratorio_Twig2($lab);
		$this->Ln(5);
		$this->Cell(0,5,'','T',0,'L');	
		$this->Ln(1);
		$this->Cell(100,5,'Código de Laboratorio: '.$datos['cod_lab'],'T',0,'L');		
		$this->Cell(0,5,'Institución: '.$datos['institucion'],'T',0,'L');
		$this->Ln(5);
		$this->Cell(100,5,'Sector: '.$datos['sector'],0,0,'L');
		$this->Cell(0,5,'Tipo Laboratorio: '.$datos['tipo_lab'],0,0,'L');
		$this->Ln(5);
		$this->Cell(0,5,'Domicilio: '.$datos['domicilio'].'('.$datos['ciudad'].')',0,0,'L');		
		$this->Ln(5);		
		$this->Cell(0,5,'Domicilio Correspondencia: '.$datos['domicilio_corresp'],0,0,'L');
		$this->Ln(5);		
		$this->Cell(0,5,'Responsable: '.$datos['responsable'],0,0,'L');
		$this->Ln(5);		
		$this->Cell(100,5,'Tel: '.$datos['tel'],'B',0,'L');
		$this->Cell(0,5,'Mail: '.$datos['mail'],'B',0,'L');	
		$this->Ln(1);	
		$this->Cell(0,5,'','B',0,'L');	
	}
   }  
}

 //PDF
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetY(15);
if ((!isset($_POST['vals']))or(!test_input($_POST['vals'])))
	$pdf->TablaError();
else
	$pdf->TablaConsulta();
$pdf->AliasNbPages();
$pdf->Output();
$pdf->Output('etiquetas.pdf','D');
?>