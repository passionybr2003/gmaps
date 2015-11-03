<?php require_once 'common/header.php'; 
$lat = $long = '';
if(isset($_POST['submit'])){
    

$key = "AIzaSyBPZCNBehLrRsLGkbk9KvhXHjIP1l8D3as";
$address = urlencode($_POST['address']);
 
//If you want an extended data set, change the output to "xml" instead of csv
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$address."&key=".$key;
//Set up a CURL request, telling it not to spit back headers, and to throw out a user agent.
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER,0); //Change this to a 1 to return headers
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
$data = curl_exec($ch);
curl_close($ch);
$data = json_decode($data,true);
//print_r($data);

if(isset($data['results'][0])){
    $lat = $data['results'][0]['geometry']['location']['lat'];
    $long = $data['results'][0]['geometry']['location']['lng'];
} else {
    $lat = $long = '0';
}


}
?>
<h2>Generate Geo Location</h2>
<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
  <div class="form-group">
    <div class="col-sm-4">
            <input type="text" class="form-control" id="lat" name="address" placeholder="Enter Address">
    </div>
  </div>
   <div class="form-group">
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </div>
</form>
<?php 
    if(isset($lat) && isset($long)){
        echo "<h4>Latitude: $lat, Longitude: $long </h4>";
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