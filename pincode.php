<?php 
require 'classes/zipcode.php';
require_once 'common/header.php'; 
if(isset($_POST['submit'])){
    
 // $address = 'Kothapet, Anantapur, Andhra Pradesh, India';
    $res = '';
    $zc = new Zipcode();
    $res = $zc->getPincode(trim($_POST['address']));
    
  
}
?>
<h1> Find Pincode</h1>
<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
  <div class="form-group">
    <div class="col-sm-4">
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php if(isset($_POST['address'] )){echo $_POST['address'];} ?>">
    </div>
  </div>
   <div class="form-group">
    <button type="submit" class="btn btn-default" name="submit">Get Pincode</button>
  </div>
</form>

 <div class="col-sm-12">
    <div class="col-sm-10" style="min-height: 400px;"> 
        <?php 
           if(isset($res) && $res != ''){
               echo $res;
           }
       ?>
   </div>
   <div class="col-sm-2"> </div>
</div>

    

<?php require_once 'common/footer.php'; ?> 


<script type="text/javascript">
    var input = (document.getElementById( "address"));
    var autocomplete = new google.maps.places.Autocomplete(input);
</script>