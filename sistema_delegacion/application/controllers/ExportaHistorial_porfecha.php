<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ExportaHistorial_porfecha extends CI_Controller {
  
    function __construct(){
        parent::__construct();
        $this->load->library("Pdf");
    }
	
public function exportaPDF($criterio) { 
	$pdf = new TCPDF('L','mm','Letter');     
	
    //InformaciÃ³n del Documento
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Liliana Elizabeth');
    $pdf->SetTitle('Historial');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   	
	
    //Configurar fuente
    $pdf->SetFont('helvetica', 'N', 10, '', true);  
 	
	//Agregar pÃ¡gina
    $pdf->AddPage(); 	
	
	//Imprimir texto
    $this->load->model('Tumba_model');
	$resultadofecha = $this->Tumba_model->buscaporfecha($criterio);

        $pdf -> Cell(60,5,"Fecha Expedición",1,0);
         $pdf -> Cell(60,5,"Solicitante Reapertura",1,0);
         $pdf -> Cell(40,5,"Telefono",1,0);
         $pdf -> Cell(60,5,"Persona Finada -Actual-",1,0);  
         $pdf -> Cell(60,5,"Perosna sepultada",1,1);
        foreach($resultadofecha as $obj){
            $pdf -> Cell(60,5,$obj->expide,1,0);
            $pdf -> Cell(60,5,$obj->solicitante,1,0);
            $pdf -> Cell(40,5,$obj->tel,1,0);
            $pdf -> Cell(60,5,$obj->finado,1,0);
            $pdf -> Cell(60,5,$obj->cadaver,1,1);
            
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