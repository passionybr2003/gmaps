<?php 
require 'classes/common_funs.php';
$cf = new Commonfuns();
require_once 'common/header.php'; 
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

     

    foreach($data['results'][0]['address_components']  as $address){
        if($address['types']['0'] == 'administrative_area_level_1'){
            $administrative_area_level_1_long_name = $cf->sanitize($address['long_name']);
            $administrative_area_level_1_short_name = $cf->sanitize($address['short_name']);
        }
        if($address['types']['0'] == 'country'){
            $country_long_name = $cf->sanitize($address['long_name']);
            $country_short_name = $cf->sanitize($address['short_name']);
        }
        if($address['types']['0'] == 'postal_code'){
            $postal_code = $cf->sanitize($address['long_name']);
        }
    }
    

    $sanitizeAddress = $cf->sanitize($data['results'][0]['formatted_address']);
    $url = $cf->constants('hostName').$sanitizeAddress.".html";

    $db = new DbConnect();
    
    $country_id_qry = "SELECT id from countries where title like '%$country_long_name%' ";
    $state_id_qry = "SELECT id from states where title like '%$administrative_area_level_1_long_name%' ";

    $country_id_res = $db->qry_select($country_id_qry);
    $country_id = $country_id_res['id'];

    $state_id_res = $db->qry_select($state_id_qry);
    $state_id = $state_id_res['id'];

    
    $country_qry = "INSERT INTO countries (title,short_code) VALUES ('$country_long_name','$country_short_name');  ";
    $states_qry = "INSERT INTO states(title,short_code) VALUES ('$administrative_area_level_1_long_name','$administrative_area_level_1_short_name');  ";
    
    
    if($country_id == ''){
        $country_id = $db->qry_insert($country_qry);
    } 
    if($state_id == '') {
        $state_id = $db->qry_insert($states_qry);
    }
    
    $sitemap_qry = "INSERT INTO sitemap (country_id,state_id,url) VALUES ($country_id,$state_id,'$url');  ";
    $zipcodes_qry = "INSERT INTO zipcodes (country_id,state_id,zipcode) VALUES ($country_id,$state_id,'$postal_code')";
    
    $url_qry = "SELECT id from sitemap where url like '%$url%' ";
    $url_res = $db->qry_select($url_qry);
    $db_url_id = $url_res['id'];
    if($country_id != '' && $state_id != '' && $db_url_id == ''){
        $db->qry_insert($sitemap_qry);
    } 

    $zipcode_qry = "SELECT id from zipcodes where zipcode like '%$postal_code%' ";
    $zipcode_res = $db->qry_select($zipcode_qry);
    $db_zipcode_id = $url_res['id'];
    if($country_id != '' && $state_id != '' && $db_zipcode_id == ''){
        $db->qry_insert($zipcodes_qry);
    }
    
    
    
    if(isset($data['results'][0])){
        $address = $data['results'][0]['formatted_address'];
    } else {
        $address = '';
    }
}
?>
<h1>Reverse Geo Location</h1>
<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
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
</div>
    <div class="col-sm-2">sdf </div>
    
</div>







<?php require_once 'common/footer.php'; ?> 