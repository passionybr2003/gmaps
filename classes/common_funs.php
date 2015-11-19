<?php 
class Commonfuns {
    public function constants($param){
        $constants['hostName'] = 'http://localhost/gmaps/';
        
        return $constants[$param];
    }
    
    public function __construct(){
        $this->require_once_files();
        $this->dbparameters();   
    }
    
    public function dbparameters(){
        if($_SERVER['HTTP_HOST'] == 'localhost'){
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
        require 'classes/DbConnect.php';
    }
    
    public function sanitize($str){
         $data = trim($str);
         $data = str_replace(" ","-",$data);
         //$data = $this->real_string($data);
         //$data = sanitize($data);
         return $data;
    }
    
    public function real_string($value){
	return mysqli::real_escape_string($value);
    }
    

}

?>