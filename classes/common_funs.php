<?php 
class Commonfuns {
    public static function constants($param){
        $constants['localhostName'] = 'http://localhost/gmaps/';
        $constants['serverName'] = 'http://www.geolatlong.com/';
        
        return $constants[$param];
    }
    
    public function __construct(){
        $this->require_once_files();
        $this->dbparameters();   
        
    }
    
    public function dbparameters(){
        if($_SERVER['SERVER_NAME'] == 'localhost'){
                define('DB_HOST','127.0.0.1');
                define('DB_USER','root');
                define('DB_PWD','');
                define('DB_NAME','gmaps');
                define('ROOT_IMG_PATH','c:/xampp/htdocs/gmaps');
                define('SRC_IMG_PATH','/image_comp_files/src/');
                define('DEST_IMG_PATH','/image_comp_files/dest/');
        } else {
                define('DB_HOST','127.0.0.1');
                define('DB_USER','u162921388_raghu');
                define('DB_PWD','Anemone$123$');
                define('DB_NAME','u162921388_gmaps');
                define('ROOT_IMG_PATH','c:/xampp/htdocs/gmaps');
        }
    }
    
    public function require_once_files(){
        require_once 'classes/DbConnect.php';
        require_once 'classes/sitemapgenerator.php';
        require_once 'classes/zipcode.php';
        require_once 'classes/ImageCompression.php';
    }
    
    public static function sanitize($str){
         $data = trim($str);
         $data = filter_var($data, FILTER_SANITIZE_STRING);
         return $data;
    }
    
    public function real_string($value){
        $db = new Dbconnect();
	return $db->real_string($value);
    }
    

}

?>