<?php 
require_once 'common/header.php'; 
if(isset($_POST['submit'])){
     $pdfData = $_FILES;
     $pc = new PdfCreator();
     $resp = $pc->create_pdf($pdfData);
     if($resp['res'] == 1 ){
         $compressed_img = $resp['dest_img_name'];
     } else {
         $error  = $resp['res'];
     }
} 
?>
<h1> Create PDF File</h1>
<div class="row" style="margin-bottom: 10px;">
    <form id="create-pdf" role="form" method="post"  action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <div class="form-group">
            <div class="col-sm-4">
                
                <input type="file" class="form-control" id="upload_file" name="upload_file" />
                <span> Supported file formats (.doc, .docx, .txt)</span>
            </div>
             
        </div>
         <div class="form-group">
            <div class="col-md-4"> 
                <button type="submit" class="btn btn-default" name="submit">Generate PDF File</button>
            </div>  
        </div>
    </form>
    
</div>
 

<?php require_once 'common/footer.php'; ?> 


 