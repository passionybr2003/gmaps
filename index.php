<?php 
require_once 'common/header.php'; 
$sg = new SitemapGenerator();
$lat = $long = '';
if(isset($_POST['submit'])){
    $key = "AIzaSyBPZCNBehLrRsLGkbk9KvhXHjIP1l8D3as";
    $address = $_POST['address'];

    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&key=".$key;
    
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
        
        $sg->save_db_sitemap($data);
    } else {
        $lat = $long = '0';
    }
}
?>
<h1> Geo Location</h1>
<div class="row" style="margin-bottom: 10px;">
    <form  id="latlong-form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="form-group">
            <div class="col-md-4">
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php if(isset($_POST['address'] )){echo $_POST['address'];} ?>">
            </div>
       </div>     
       <div class="form-group">
           <div class="col-md-4">
                <button type="submit" class="btn btn-default" name="submit">Get Lat-Long</button>
           </div>
     </div>     
    </form>
    <div>
        <a href="reverse-geo-coding.html">Reverse Geo Location </a>
    </div>
</div>
<?php 
    if(isset($lat) && isset($long) && $lat != ''){
        echo "<h4>Latitude: $lat, Longitude: $long </h4>";
    }
?>
<div>
        <?php 
            $embedKey="AIzaSyAhSHh9xMIFQoncTnXARzX6jdOSL8Qs5YE";
            $url = "https://www.google.com/maps/embed/v1/place?key=$embedKey&q=".$lat.",".$long;
        ?>
        <iframe  src="<?php echo $url?>"  class="well well-sm"  width="100%" height="500px"></iframe>

        <div class="desc1">
            <h3>Latitude</h3>
            <p>
                Latitude is a geographic coordinate that defines the angular distance of a place either north or south position of the earth's equator.
                It is an angle  which ranges from 0&deg; at the Equator to 90&deg; (North or South) at the poles of earth.
                Latitude is used along with longitude to specify the precise location of address.
            </p>

            <h3>Longitude</h3>
            <p>
                Longitude is a geographic coordinate that specifies the angular distance of a place east or west position from the Prime Meridian,
                ranging from 0&deg; at the Prime Meridian to +180&deg; eastward and -180&deg; westward.Usually it is expressed in degrees and minutes.

            </p>
        </div>
     
</div>


<?php require_once 'common/footer.php'; ?> 


<script type="text/javascript">
var input = (document.getElementById( "address"));
var autocomplete = new google.maps.places.Autocomplete(input);
</script>