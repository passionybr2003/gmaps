<?php 
class Zipcode {
    
    private $_appKey = 'gpuwbla21jievzymy32g959p';
    private $_url = 'https://www.whizapi.com/api/v2/util/ui/in/indian-postal-codes';
   
   public function getPincode($address=''){
        list($location,$city,$state,$country) = explode(",",$address);
        $res = $this->callApi($location);
        if(!empty($res['Data'])){
            $data = '';
            foreach($res['Data'] as $info){
                if($info['City'] == trim($city) && $info['State'] == trim($state) && $info['Country'] == trim($country) ){
                    $data .= "<div> <h4>Pincode : ". $info['Pincode']." </h4>"
                            ."<span> City       : </span>". $info['City']." <br>"
                            ."<span> State      : </span>". $info['State']." <br>"
                            ."<span> Country    : </span>". $info['Country']." <br>"
                            ."</div>"
                            ;
                }
            }
        }  
        if( $res['Data'] == '') {
           // $data = "<h3> No records found </h3>";
            $key = "AIzaSyBPZCNBehLrRsLGkbk9KvhXHjIP1l8D3as";
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&key=".$key;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER,0); //Change this to a 1 to return headers
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $data = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($data,true);
            $postalCodeArr = end($data['results'][0]['address_components']);
            if($postalCodeArr["types"][0] == 'postal_code' && $postalCodeArr["long_name"] != ''){
                $data = "<h3>Pincode : ".$postalCodeArr["long_name"]."</h3>";
            }
        }
        return $data;
   }
   
   /*
     * https://www.whizapi.com/
     */
    public function callApi($address=''){
        $params = "?search=$address&project-app-key=$this->_appKey";
        $url = $this->_url.$params;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER,0); //Change this to a 1 to return headers
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data,true);
   }
   
   /*
    * ref: http://www.getpincode.info/api.html
    * 
    */ 
   public function callOtherApi($address=''){
        $baseUrl = 'http://www.getpincode.info/api/pincode';
        $params = "?q=$address";
        $url = $baseUrl.$params;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER,0); //Change this to a 1 to return headers
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $data = curl_exec($ch);
        curl_close($ch);
        return $data = json_decode($data,true);
   }
     
  
     

}

?>