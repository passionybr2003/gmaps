<?php require_once 'common/header.php'; 

$key = "AIzaSyBPZCNBehLrRsLGkbk9KvhXHjIP1l8D3as";
$address = urlencode("columbia MO");
 
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
$lat = $data['results'][0]['geometry']['location']['lat'];
$long = $data['results'][0]['geometry']['location']['lng'];
echo "<h4>$lat, $long </h4>";
?>
<h2>Generate Geo Location</h2>
<form role="form" >
  <div class="form-group">
    <div class="col-sm-4">
            <input type="text" class="form-control" id="lat" name="lat" placeholder="Enter Latitude">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">
        <input type="text" class="form-control" id="long" name="long" placeholder="Enter Longitude">
    </div>  
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default ">Submit</button>
  </div>
</form>

<div id="gmap_res">




</div>
<?php require_once 'common/footer.php'; ?> 