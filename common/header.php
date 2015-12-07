<?php
error_reporting(1);
require 'classes/common_funs.php';
$cf = new Commonfuns();
require_once 'meta_file.php';
$fileName = basename($_SERVER['SCRIPT_NAME'],'.php');
$title = $meta_data[$fileName]['title'];
$description = $meta_data[$fileName]['description'];
$keywords = $meta_data[$fileName]['keywords'];



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>geolatlong.com :: <?php echo $title;?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" <?php echo $description;?>" />
    <meta name="keywords" content=" <?php echo $keywords;?>" />
    <meta name="google-site-verification" content="i-qzRiaL1TsdsXF8N6O4LtKZhTKK2lhsakuc5zw_iD4" />
   
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
    
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-default .navbar-nav>li>a {color:white;}
        .active>a {background-color: #155878 !important;color:white !important;}
    </style>
   </head>

  <body>

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px !important;background-color: #36ade4;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="/">Geolatlong.com</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php echo ($fileName == 'index') ? 'active' : '';?>"><a href="index.html">Home</a></li>
            <li class="<?php echo ($fileName == 'reverse-geo-coding') ? 'active' : '';?>"><a href="reverse-geo-coding.html">Reverse Geo Location</a></li>
            <li class="<?php echo ($fileName == 'pincode') ? 'active' : '';?>"><a href="pincode.html">Pincodes</a></li>
            <li class="<?php echo ($fileName == 'image-compressor') ? 'active' : '';?>"><a href="image-compressor.html">Image Resize</a></li>
            <!--
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            -->
          </ul>
           
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container" style="background-color: #D4D8D1;">
