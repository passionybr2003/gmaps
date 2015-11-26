<?php 
class Commonfuns {
    public function constants($param){
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
        } else {
                define('DB_HOST','127.0.0.1');
                define('DB_USER','u162921388_raghu');
                define('DB_PWD','Anemone$123$');
                define('DB_NAME','u162921388_gmaps');
        }
    }
    
    public function require_once_files(){
        require_once 'classes/DbConnect.php';
        require_once 'classes/sitemapgenerator.php';
        require_once 'classes/zipcode.php';
    }
    
    public function sanitize($str){
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