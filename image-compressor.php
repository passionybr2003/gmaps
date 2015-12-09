<?php 
require_once 'common/header.php'; 
$sg = new SitemapGenerator();
$lat = $long = '';
if(isset($_POST['submit'])){
    $_FILES['quality'] = $_POST['quality'];
     $imageData = $_FILES;
     $ic = new ImageCompression();
     $resp = $ic->save_image($imageData);
     if($resp['res'] == 1 ){
         $compressed_img = $resp['dest_img_name'];
     } else {
         $error  = $resp['res'];
     }
}
?>
<h1> Optimize Image size</h1>
<div class="row" style="margin-bottom: 10px;">
    <form id="img-resize" role="form" method="post"  action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <div class="form-group">
            <div class="col-sm-4">
                <input type="file" class="form-control" id="img" name="img" />
            </div>
             <div class="col-sm-4">
                 <input type="text" placeholder="Enter quality" class="form-control" id="quality" name="quality" value="<?php $q = $_POST['quality'];echo (isset($q))?$q:''; ?>"/>
            </div>  
        </div>
         <div class="form-group">
            <div class="col-md-4"> 
                <button type="submit" class="btn btn-default" name="submit">Upload</button>
            </div>  
        </div>
    </form>
</div>
<div class="col-sm-12">
        <div class="desc1">
            <?php 
                if(isset($compressed_img)  && $compressed_img != ''){
                    echo "<a class='btn btn-primary' href='image_download.php?file=$compressed_img'> Download Optimized Image </a>";
                } else if(isset($error) && $error != ''){
                    echo "<div class='info info-warning'>$error</div>";
                }
            ?>
            <h3>Image Compression </h3>
            <p>
               Image compression is method of reducing the size in terms of bytes of photo. By reducing size of images, we can attach in mails, 
               can use in web sites or blogs, use in personal portfolios and save in hard disks.
            </p>
            <p>
                By using this site, user can get the optimize image with his choice of <b> quality (10-100)</b>.
            </p>
        </div>   
    
</div>

<?php require_once 'common/footer.php'; ?> 


 