<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ExportaHistorial_contrato extends CI_Controller {
  
    function __construct(){
        parent::__construct();
        $this->load->library("Pdf");
    }
	
public function exportaPDF($criterio) { 
	$pdf = new TCPDF('L','mm','Letter');     
	
    //InformaciÃ³n del Documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Liliana Elizabeth');
    $pdf->SetTitle('Historial contrato');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   	
	
    //Configurar fuente
    $pdf->SetFont('helvetica', 'N', 10, '', true);  
 	
	//Agregar pÃ¡gina
    $pdf->AddPage(); 	
	
	//Imprimir texto
    $this->load->model('HistorialContrato_model');
	$resultadocontrato = $this->HistorialContrato_model->buscacontrato($criterio);

        $pdf -> Cell(60,5,"Comprador",1,0);
         $pdf -> Cell(60,5,"Vendedor",1,0);
         $pdf -> Cell(40,5,"Fecha Contratro",1,0);
         $pdf -> Cell(70,5,"Dirección Terreno",1,0);  
         $pdf -> Cell(40,5,"Precio",1,1);
        foreach($resultadocontrato as $obj){
            $pdf -> Cell(60,5,$obj->comprador,1,0);
            $pdf -> Cell(60,5,$obj->vendedor,1,0);
            $pdf -> Cell(40,5,$obj->fecha,1,0);
            $pdf -> Cell(70,5,$obj->principal,1,0);
            $pdf -> Cell(40,5,$obj->precio,1,1);
            
        }
        
        
       /* $pdf -> Cell(20,5,"Esta es una celda1",1,1);
        $pdf -> Cell(20,5,"Esta es una celda2",1,0);
        $pdf -> Image('./assets/images/0.jpg',10,10,10,10);
    $nom = $this->input->post('nombre');	
	$pdf -> Text(10,20,"tu nombre: ".$nom);
	
    $edad = $this->input->post('edad');	
	$pdf -> Text(10,25,"edad: ".$edad);
	
	
	  $telefono = $this->input->post('telefono');	
	$pdf -> Text(10,30,"telefono: ".$telefono);
	*/
	ob_get_clean();
    $pdf -> Output('ReporteHistorialPermiso.pdf', 'I');   	
    }
}
?>