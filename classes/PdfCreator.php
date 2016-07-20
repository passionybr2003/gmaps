<?php 
require 'plugins/fpdf/fpdf.php';
class PdfCreator {

    function create_pdf($pdfData){
       $res = $src = $dest = $localhostPath = '';
       $check = getimagesize($pdfData["upload_file"]["tmp_name"]);
       $rootPath = ROOT_IMG_PATH;
       $srcImgPath = SRC_IMG_PATH;
       $destImgPath = DEST_IMG_PATH;
       
       $imageFileType = pathinfo($pdfData["upload_file"]["name"],PATHINFO_EXTENSION);
       // Crosscheck the $check functionality and error msg 
       if($check) {
            $res = "Invalid File";
       } else if ($pdfData["upload_file"]["size"] > 100000000) {
            $res = "Sorry, your file is too large.";
       } else if($imageFileType != "doc" && $imageFileType != "docx" && strtolower($imageFileType) != "txt"  ) {
            $res = "Sorry, only doc,docx,txt files are allowed.";
       } else {
            if (move_uploaded_file($pdfData["upload_file"]["tmp_name"], $rootPath.$srcImgPath.basename($pdfData["upload_file"]["name"]))) {
                 $res = "1";
            } else {
                $res = "Sorry, there was an error uploading your file.";
            }
       }
       $src = $rootPath.$srcImgPath.basename($pdfData["upload_file"]["name"]);
       $dest = $rootPath.$destImgPath.basename($pdfData["upload_file"]["name"]);
       $srcText = file_get_contents($src);
       $this->generate_pdf($srcText,$dest);
       $resp['res'] = $res;
       $resp['dest_upload_file_name'] = basename($pdfData["upload_file"]["name"]);
        return $resp;
   }
    
   private function generate_pdf($srcText,$dest){
       // Set some document variables
        $author = "";
        $x = 50;
        $text = "<<<EOT".
                    $srcText.
        "EOT";
        // Create fpdf object
        $pdf = new FPDF('P', 'pt', 'Letter');
        // Set base font to start
        $pdf->SetFont('Times', 'B', 24);
        // Add a new page to the document
        $pdf->addPage();
        // Set the x,y coordinates of the cursor
        $pdf->SetXY($x,50);
        // Write 'Simple PDF' with a line height of 1 at the current position
        $pdf->Write(25,'Simple PDF');
        // Reset the font
        $pdf->SetFont('Courier','I',10);
        // Set the font color
        $pdf->SetTextColor(255,0,0);
        // Reset the cursor, write again.
        $pdf->SetXY($x, 75);
        $pdf->Cell(0,11, "By: $author", 'B', 2, 'L', false);

        // Place an image on the pdf document
        //$pdf->Image('graph.jpg', $x, 100, 150, 112.5, 'JPG');

        // Reset font, color, and coordinates
        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY($x, 250);

        // Write out a long text blurb.
        $pdf->write(13, $srcText);
        
//        echo "<pre>";
//        print_r($pdf);exit;
        $fileName = substr($dest,0,strpos($dest,'.'))."_".time().'.pdf';
        $pdf->Output($fileName,'F');

       
   }
   
   
   
 
}
?>
