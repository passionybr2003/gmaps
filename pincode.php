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
<form id="pin-form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
  <div class="form-group">
        <div class="col-sm-4">
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php if(isset($_POST['address'] )){echo $_POST['address'];} ?>">
        </div>
  </div>
   <div class="form-group">
       <div class="col-md-4">
           <button type="submit" class="btn btn-default" name="submit">Get Pincode</button>
       </div>    
  </div>
</form>

 <div class="col-sm-12">
    <div class="col-sm-10" style="min-height: 400px;"> 
        <?php 
           if(isset($res) && $res != ''){
               echo $res;
           }
       ?>
        
         
<div class="desc1">
    <h3>Pincode system in India </h3>
    <p>
       A Postal Index Number or PIN or Pincode is a code system used by India Post. It was introduced on 15 August 1972.The length of  the code is six digits.
       <ol>
        <li>The first digit represents region of india </li>
        <li>The second digit represents sub region</li>
        <li>The third digit represents sorting district</li>
        <li>The last three digits represents post office</li>
      </ol>
    </p>
</div>   
   </div>
   <div class="col-sm-2"> </div>
</div>

    

<?php require_once 'common/footer.php'; ?> 


<script type="text/javascript">
    var input = (document.getElementById( "address"));
    var autocomplete = new google.maps.places.Autocomplete(input);
</script>