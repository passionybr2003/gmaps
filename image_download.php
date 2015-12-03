<?php
require 'classes/common_funs.php';
$cf = new Commonfuns();
$dir_path = ROOT_IMG_PATH.DEST_IMG_PATH;
$mime_extns = array(
                    "gif" => "image/gif",
                    "png" => "image/png",
                    "jpeg"=> "image/jpg",
                    "jpg" =>  "image/jpg",
                );
if(isset($_GET['file'])) { $filname = $dir_path.$_GET['file'] ;}
header("Content-type: image/jpg"); 
header("Content-Disposition: attachment; filename=$_GET[file]"); 
header("Content-Transfer-Encoding: binary");
 header('Accept-Ranges: bytes');
header("Pragma: no-cache"); 
header("Expires: 0"); 
readfile("$filname");
?>