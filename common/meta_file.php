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
            'title'=>"Lat long of $title",
            'description'=>"Find latlong (latitude and longitude) of $title and show on google maps",
            'keywords'=>'find lat long coordinates, lat and long in google maps,get lat long from location,latlong google api,find out lat long'
        ),
        'image-compressor'=>array(
            'title'=>"Compress and resize jpeg images",
            'description'=>"Compress or optimize the size of jpeg ,png, jpg images  with out quality loss",
            'keywords'=>'image compressor, optimize images, reduce image size, optimize image quality'
        ),
        'online-md5-generator'=>array(
            'title'=>'Generate md5 online',
            'description'=>'To encrypt the message using md5() function in php',
            'keywords'=>'md5(), md5 generator in php, md5() in php, encrypt md5, md5 php decrypt, php md5 decrypt online'
        ),
        'base64-encode-decode'=>array(
            'title'=>'Online Base64 encode and decode',
            'description'=>'To encrypt the message with base64_encode and decrypt the messagge with base64_decode using php online',
            'keywords'=>'base64 encode php, base64 decode php,base64 decode online, base64 encode online'
        ),
        'online-sha1-generator'=>array(
            'title'=>'Online SHA1 Encryption',
            'description'=>'To encrypt the message using sha1() function in php online',
            'keywords'=>'sha1() in php, generate sha1 in php, encrypt sha1 php'
        ),
        'url-encode-decode'=>array(
            'title'=>"Online URL Encode and Decode",
            'description'=>'online Encode or decode the given url ',
            'keywords'=>'php urlencode online, php urldecode online, url encode or decode in php'
        ),
        'online-json-beautifier'=>array(
            'title'=>"Online JSON Beautifier",
            'description'=>'Make plain json string into user readable format or beautify',
            'keywords'=>'json beautifier online,json formatter php, php json beautifier'
        )
        
        
    );
?>