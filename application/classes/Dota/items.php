<?php
class Dota_Items {
    var $items;
    
    public function __construct() {
        $session = Session::instance();
        
        if($session->get('items') == null) {
            $filename = dirname(dirname(dirname(dirname(__FILE__)))) . "/resources/ingame/items.txt";
            if(file_exists($filename)) {
                $file = fopen($filename, "rb");
                
                $string = "";
                while(!feof($file)) {
                    $line = trim(fgets($file));
                    $string .= $line;
                }
                
                $result = json_decode($string);
                $this->items = $result->items;
                
                $session->set('items', $this->items);
            }
        }
    }
    
    public function items() {
        return $this->items;
    }
}
?>