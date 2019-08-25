<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ExportaHistorial_tumba extends CI_Controller {
  
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
	$resultadotumba = $this->Tumba_model->buscatumba($criterio);

        $pdf -> Cell(60,5,"Persona Sepultada",1,0);
         $pdf -> Cell(40,5,"Tiempo en años",1,0);
         $pdf -> Cell(45,5,"Largo en mtrs",1,0);
         $pdf -> Cell(40,5,"Ancho en mtrs",1,0);
         $pdf -> Cell(40,5,"Separación en cm",1,0);
         $pdf -> Cell(60,5,"Perosna Reciente enterrada",1,1);
        foreach($resultadotumba as $obj){
            $pdf -> Cell(60,5,$obj->tumba,1,0);
            $pdf -> Cell(40,5,$obj->tiempo,1,0);
            $pdf -> Cell(45,5,$obj->largo,1,0);
            $pdf -> Cell(40,5,$obj->ancho,1,0);
            $pdf -> Cell(40,5,$obj->separacion,1,0);
            $pdf -> Cell(60,5,$obj->actual,1,1);
            
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