<?php 
$title = '';
if(isset($_GET['a']) && $_GET['a'] !=''){
    $title = $_GET['a'];
}
    $meta_data = array(
        'index'=>array(
            'title'=>'Conversion of location into latlong',
            'description'=>'Find  latlong (latitude and longitude) of location and show latlong on google maps',
            'keywords'=>'how to get lat long coordinates,google maps lat long,get lat long from address,get lat long from address google api,get lat long from city name'
        ),
        'reverse-geo-coding'=>array(
            'title'=>'Conversion of Lat Long into Address',
            'description'=>'Get location and show location on map based on latitude and longitude which is provided ',
            'keywords'=>'get address from lat long,get address from lat long google maps api,find address from lat long,get address from lat long api'
        ),
        'pincode'=>array(
            'title'=>'Find pincode from address',
            'description'=>'Get the pincode from address which is given by user ',
            'keywords'=>'find pincode, get pincode from address,how to find zipcode,how to find postal code,how to find pincode'
        ),
        'latlong'=>array(
            'title'=>" Lat long of $title",
            'description'=>"Find latlong (latitude and longitude) of $title and show on google maps",
            'keywords'=>'find lat long coordinates, lat and long in google maps,get lat long from location,latlong google api,find out lat long'
        ),
    );
?>