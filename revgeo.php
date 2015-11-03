<?php require_once 'common/header.php'; 
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

if(isset($data['results'][0])){
    $address = $data['results'][0]['formatted_address'];
} else {
    $address = '';
}


}
?>
<h2>Reverse Geo Location</h2>
<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
  <div class="form-group">
    <div class="col-sm-4">
            <input type="text" class="form-control" id="lat" name="lat" placeholder="Enter lat" value="<?php if(isset($lat)){echo $lat;} ?>">
    </div>
      <div class="col-sm-4">
            <input type="text" class="form-control" id="long" name="long" placeholder="Enter long" value="<?php if(isset($long)){echo $long;} ?>">
    </div>
  </div>
   <div class="form-group">
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </div>
</form>
<?php 
    if(isset($lat) && isset($long)){
        echo "<h4>Geo Location: $address  </h4>";
    }
?>

<div id="gmap_res">

<?php 
$embedKey="AIzaSyAhSHh9xMIFQoncTnXARzX6jdOSL8Qs5YE";
$url = "https://www.google.com/maps/embed/v1/place?key=$embedKey&q=".$lat.",".$long;
?>
    <iframe style="visibility: none;" src="<?php echo $url?>" width="100%" height="1080px" ></iframe>

</div>
<?php require_once 'common/footer.php'; ?> 