<?php 
require_once 'meta_file.php';
$fileName = basename($_SERVER['SCRIPT_NAME'],'.php');
$title = $meta_data[$fileName]['title'];
$description = $meta_data[$fileName]['description'];
$keywords = $meta_data[$fileName]['keywords'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title;?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" <?php echo $description;?>" />
    <meta name="keywords" content=" <?php echo $keywords;?>" />
    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
   </head>

  <body>

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">GetLatLong.com</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="reverse-geo-coding.html">Reverse Geo Location</a></li>
          
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


    <div class="container" style="background-color: #eee;">
