<?php 
class SitemapGenerator {
    
    private $_appPath = 'http://localhost/gmaps/';
    private $_projectName = 'gmaps/';
    private $_xmlFilesPath = 'sitemaps/';
    private $_multiLevelStartTag = 'sitemapindex';
    private $_singleLevelStartTag = 'urlset';
    
    
    
    
    public function multiLevelSitemap($sitemapData = array()){
        
        $objDom = new DomDocument( '1.0' );
        foreach($sitemapData as $fileData){
            $this->createFiles($fileData['fileName'],$this->_multiLevelStartTag);
            $filePath = $_SERVER['DOCUMENT_ROOT']. "/" . $this->_projectName . $this->_xmlFilesPath . $fileData['fileName'];
            
            $xml = file_get_contents($filePath);
            $objDom->loadXML( $xml, LIBXML_NOBLANKS );
            $root = $objDom->getElementsByTagName('sitemapindex')->item(0);
            
            foreach($fileData['sitemap'] as  $key=>$locs){
                $sitemap = $objDom->createElement("sitemap");
                $root->insertBefore($sitemap);
                foreach($locs as $tag=>$val){
                    $tagVal = $objDom->createElement($tag);
                    $sitemap->appendChild($tagVal);
                    $tagVal->appendChild($objDom->createTextNode($val));
                }
            }
            
            file_put_contents($filePath, $objDom->saveXML());
            
        }
    }

    
    public function createFiles($fileName = '',$startTag = ''){
        $filePath = $_SERVER['DOCUMENT_ROOT']. "/" . $this->_projectName . $this->_xmlFilesPath . $fileName;
        if(!file_exists($filePath)){
            fopen($filePath,'w');
            
            $objDom = new DomDocument( '1.0' );
            $objDom->preserveWhiteSpace = true;
            $objDom->formatOutput = true;
            $xml = file_get_contents($filePath);
            $objDom->loadXML( $xml, LIBXML_NOBLANKS );
            $objDom->encoding = 'UTF-8';
            $objDom->formatOutput = true;
            $objDom->preserveWhiteSpace = false;

            $root = $objDom->createElement($startTag);
            $objDom->appendChild($root);

            $root_attr = $objDom->createAttribute("xmlns"); 
            $root->appendChild($root_attr); 

            $root_attr_text = $objDom->createTextNode("http://www.sitemaps.org/schemas/sitemap/0.9"); 
            $root_attr->appendChild($root_attr_text);
            file_put_contents($filePath, $objDom->saveXML());
            
            
            return true;
         }
        
    }
    public function singleLevelSitemap($sitemapData){
        $objDom = new DomDocument( '1.0' );
        foreach($sitemapData as $fileData){
            $fileData['fileName'];
            $this->createFiles($fileData['fileName'],$this->_singleLevelStartTag);
            $filePath = $_SERVER['DOCUMENT_ROOT']. "/" . $this->_projectName . $this->_xmlFilesPath . $fileData['fileName'];
            
            $xml = file_get_contents($filePath);
            $objDom->loadXML( $xml, LIBXML_NOBLANKS );
            $root = $objDom->getElementsByTagName($this->_singleLevelStartTag)->item(0);
            foreach($fileData['url'] as  $key=>$locs){
                $sitemap = $objDom->createElement("url");
                $root->insertBefore($sitemap);
                foreach($locs as $tag=>$val){
                    $tagVal = $objDom->createElement($tag);
                    $sitemap->appendChild($tagVal);
                    $tagVal->appendChild($objDom->createTextNode($val));
                }
            }
            file_put_contents($filePath, $objDom->saveXML());
            
        }
     }
     
     
  
     

}

?>