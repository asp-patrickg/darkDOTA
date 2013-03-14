<?php
define("LOCATION_API_KEY", "0d74936b49591012dce9749709b4af69095fbda5c6936eb8e71eb556ef88827b");

class Helpers_Location {
    public static function get_location($ip = null) {
        $ip = $ip == null ? '112.203.176.106' : $ip;
        $url = "http://api.ipinfodb.com/v3/ip-country?key=".constant("LOCATION_API_KEY")."&ip={$ip}";
        
        $string = Helpers_Util::curl($url);
        $result = Helpers_Location::get_country($string);
        
        return $result;
    }
    
    private static function get_country($result) {
        list($status, $error, $ip, $code, $country) = explode(';', $result);
        return array('status' => $status, 'error' => $error, 'ip' => $ip, 'code' => $code, 'country' => $country);
    }
}
?>