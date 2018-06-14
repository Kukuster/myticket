<?php


if (isset($_POST['pdf_text']) && !empty($_POST['pdf_text'])){
    
    
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',16);
    $pdf->MultiCell(0,10,$_POST['pdf_text']);
    $pdf->Output('D',$_POST['filename']);
    
}


