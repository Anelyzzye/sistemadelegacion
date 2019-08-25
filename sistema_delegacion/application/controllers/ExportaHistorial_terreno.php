<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ExportaHistorial_terreno extends CI_Controller {
  
    function __construct(){
        parent::__construct();
        $this->load->library("Pdf");
    }
	
public function exportaPDF($criterio) { 
	$pdf = new TCPDF('L','mm','Letter');     
	
    //InformaciÃ³n del Documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Liliana Elizabeth');
    $pdf->SetTitle('Historial terreno');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   	
	
    //Configurar fuente
    $pdf->SetFont('helvetica', 'N', 8, '', true);  
 	
	//Agregar pÃ¡gina
    $pdf->AddPage(); 	
	
	//Imprimir texto
    $this->load->model('Terreno_model');
	$resultadoterreno = $this->Terreno_model->buscaterreno($criterio);

        $pdf -> Cell(60,5,"Dueño actual",1,0);
         $pdf -> Cell(60,5,"Dirección Principal",1,0);
         $pdf -> Cell(40,5,"Superficie Medida",1,0);
         $pdf -> Cell(30,5,"Al norte",1,0);  
         $pdf -> Cell(30,5,"Al sur ",1,0);
         $pdf -> Cell(30,5,"Al poniente ",1,0);
         $pdf -> Cell(30,5,"Al oriente",1,1);
        foreach($resultadoterreno as $obj){
            $pdf -> Cell(60,5,$obj->comprador,1,0);
            $pdf -> Cell(60,5,$obj->principal,1,0);
            $pdf -> Cell(40,5,$obj->superficie,1,0);
            $pdf -> Cell(30,5,$obj->norte,1,0);
            $pdf -> Cell(30,5,$obj->sur,1,0);
            $pdf -> Cell(30,5,$obj->oriente,1,0);
            $pdf -> Cell(30,5,$obj->poniente,1,1);
            
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
    $pdf -> Output('ReporteHistorialterreno.pdf', 'I');   	
    }
}
?>