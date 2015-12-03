<?php 
require_once 'common/header.php'; 
$sg = new SitemapGenerator();
$lat = $long = '';

if(isset($_POST['submit'])){
    $key = "AIzaSyBtdwakOHGgJ8p9llMUHIdYCxvX2QWoZos";
    $lat =  ($_POST['lat']);
    $long =  ($_POST['long']);
    $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&key=$key";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER,0); //Change this to a 1 to return headers
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $data = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($data,true);


    
    
    $sg->save_db_sitemap($data);
    
    if(isset($data['results'][0])){
        $address = $data['results'][0]['formatted_address'];
    } else {
        $address = '';
    }
}
?>
<h1>Reverse Geo Location</h1>
<form id="reverse-geo" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
  <div class="form-group">
    <div class="col-sm-4">
            <input type="text" class="form-control" id="lat" name="lat" placeholder="Enter latitude" value="<?php if(isset($lat)){echo $lat;} ?>">
    </div>
      <div class="col-sm-4">
            <input type="text" class="form-control" id="long" name="long" placeholder="Enter longitude" value="<?php if(isset($long)){echo $long;} ?>">
    </div>
  </div>
   <div class="form-group">
    <button type="submit" class="btn btn-default" name="submit">Get Address</button>
  </div>
</form>
<?php 
    if(isset($address)){
       $address =  ($address == '' )? 'No results found': $address;
       echo "<h4>Address :  $address  </h4>";
    }
?>

 


<div class="col-sm-12">
    <div class="col-sm-10"> 


<?php 
$embedKey="AIzaSyAhSHh9xMIFQoncTnXARzX6jdOSL8Qs5YE";
$url = "https://www.google.com/maps/embed/v1/place?key=$embedKey&q=".$lat.",".$long;
?>
    <iframe style="visibility: none;" src="<?php echo $url?>" class="well" width="100%" height="500px" ></iframe>
    
<div class="desc1">
    <h3>Reverse Geocoding</h3>
    <p>
       The word Reverse geocoding is process of traslating latitude and longitude into location on the map into a human-readable address or place.
    </p>
    
     
</div>
    
    
</div>
    <div class="col-sm-2"> </div>
    
</div>







<?php require_once 'common/footer.php'; ?> 