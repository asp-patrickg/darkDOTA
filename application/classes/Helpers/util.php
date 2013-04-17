<?php
class Helpers_Util {
    /**
     * To change the logo, just save the image in the
     * resources directory as logo.png or other extensions.
     * Just be sure to update the filename within this function.
     * 
     * @return String
     */
    public static function getLogoLink() {
        return "resources/darkdota-banner.png";
    }
    
    /**
     * Gets the user's IP address.
     * 
     * @return String | null
     */
    public static function get_user_ip() {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip);

                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE | FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6) !== false){
                        return $ip;
                    }
                }
            }
        }
        
        return null;
    }
    
    /**
     * Gets the country's flag.
     * 
     * @param array $location
     * @param boolean $code
     * @return String 
     */
    public static function get_flag($class = null) {
        $class = is_null($class) ? '' : 'class="'.$class.'" ';
        $ip = Helpers_Util::get_user_ip();
        $result = Helpers_Location::get_location($ip);
        
        $country = strtolower($result['country']);
        
        $country = $country == "c" ? "ivory coast" : $country; // Fix for the Ivory Coast problem.
        $country = $country == "macao" ? "macau" : $country; // Fix for the Macau problem.
        $country = strpos($country, "macedonia") !== false ? "macedonia" : $country; // Fix for the Macedonia problem.
        $country = strpos($country, "moldova") !== false ? "moldova" : $country; // Fix for the Moldova problem.
        $country = strpos($country, "russia") !== false ? "russia" : $country; // Fix for the Russia problem.
        $country = strpos($country, "taiwan") !== false ? "taiwan" : $country; // Fix for the Taiwan problem.
        $country = strpos($country, "vatican") !== false ? "vatican" : $country; // Fix for the Vatican problem.
        $country = strpos($country, "venezuela") !== false ? "venezuela" : $country; // Fix for the Venezuela problem.
        $country = strpos($country, "viet nam") !== false ? "vietnam" : $country; // Fix for the Vietnam problem.
        
        if(!file_exists("resources/icons/flags/flag_".Helpers_Util::insert_underscore($country).".png")) {
            $country = "unknown"; // For countries which does not have a flag (yet).
        }
        
        $file = "resources/icons/flags/flag_".Helpers_Util::insert_underscore($country).".png";
        return '<a href="#" '.$class.'title="'.ucwords($country).'">'.HTML::image($file, array('alt' => ucwords($country)))."</a>\n";
    }
    
    /**
     * Replaces the space character with an underscore.
     * 
     * @param String $string
     * @return String 
     */
    private static function insert_underscore($string) {
        $string = str_replace(',', '', $string);
        return str_replace(' ', '_', $string);
    }
    
    /**
     * Open a URL and return the result.
     * 
     * @param String $url
     * @param boolean $exec
     * @return String 
     */
    public static function curl($url, $exec = false) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 12000);
        
        if(!$exec) {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        }
        
        if(stripos("https", $url) == 0) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
    
    /**
     * Gets the path and filename of a random advertisement.
     * 
     * @return String 
     */
    public static function getAdvertisement() {
        $ads = array(
            "includes/bidvertiser/bidvertiser01",
            "includes/hostgator/hostgator01",
            "includes/hostgator/hostgator02",
            "includes/hostgator/hostgator03",
            "includes/hostgator/hostgator04",
            "includes/hostgator/hostgator05",
            "includes/hostgator/hostgator06",
            "includes/hostgator/hostgator07",
            "includes/hostgator/hostgator08",
            "includes/hostgator/hostgator09",
            "includes/hostgator/hostgator10",
            "includes/hostgator/hostgator11",
            "includes/hostgator/hostgator12",
            "includes/hostgator/hostgator13",
            "includes/hostgator/hostgator14",
            "includes/hostgator/hostgator15",
            "includes/hostgator/hostgator16",
            "includes/wphosting/wphosting01"
        );
        
        $min = 0;
        $max = count($ads)-1;
        $r = rand($min, $max);
        return $ads[$r];
    }
    
    /**
     * Returns an HTML table with the headers and all the data.
     * 
     * @param array $headers
     * @param array $data
     * @param array $extra
     * @return String 
     */
    public static function getMatchTable($headers = array(), $data = array(), $extra = null) {
        $table = "<table border=\"0\" cellpadding=\"5\"><tr>";
        
        foreach($headers as $i => $header) {
            switch($i) {
                case 0:
                    $class = "th180";
                    break;
                case 1:
                    $class = "th200";
                    break;
                case 2:
                    $class = "th30";
                    break;
                case 3:
                    $class = "th20";
                    break;
                case 4:
                    $class = "th20";
                    break;
                case 5:
                    $class = "th20";
                    break;
                case 6:
                    $class = "th50";
                    break;
                case 7:
                    $class = "th30";
                    break;
                case 8:
                    $class = "th30";
                    break;
                case 9:
                    $class = "th40";
                    break;
                case 10:
                    $class = "th40";
                    break;
                case 11:
                    $class = "th340";
                    break;
                default:
                    $class = "th100";
                    break;
            }
            
            $table .= "<th class=\"header center {$class}\">{$header}</th>";
        }
        
        $table .= "</tr>";
        
        foreach($data as $i => $row) {
            $rowClass = $i%2 == 0 ? "even" : "odd";
            
            if($row['player'] == Helpers_Strings::getString("ANONYMOUS")) {
                $href = "#";
            } else {
                $href = $row['player_url'];
            }
            
            $items = "";
            $playerItems = $row['items'];
            foreach($playerItems as $item) {
                $img = Helpers_Dota::getItemImage($item);
                $items .= $img;
            }
            
            $table .= "
                <tr class=\"{$rowClass}\">
                    <td><a href=\"{$href}\"><div class=\"image\"><img class=\"img24\" src=\"{$row['player_avatar']}\" alt=\"{$row['player']}\" title=\"{$row['player']}\" /></div><div class=\"name\">{$row['player']}</div></a></td>
                    <td><a href=\"#\"><div class=\"image\"><img class=\"img24\" src=\"{$row['hero_image']}\" alt=\"{$row['hero']}\" title=\"{$row['hero']}\" /></div><div class=\"name\">{$row['hero']}</div></a></td>
                    <td class=\"center\">{$row['level']}</td>
                    <td class=\"center\">{$row['kills']}</td>
                    <td class=\"center\">{$row['deaths']}</td>
                    <td class=\"center\">{$row['assists']}</td>
                    <td class=\"center\">{$row['gold']}</td>
                    <td class=\"center\">{$row['last_hits']}</td>
                    <td class=\"center\">{$row['denies']}</td>
                    <td class=\"center\">{$row['xp_per_min']}</td>
                    <td class=\"center\">{$row['gold_per_min']}</td>
                    <td>{$items}</td>
                </tr>";
        }
        
        $footer = count($headers);
        $table .= "<tr><th colspan=\"{$footer}\"></th></tr>";
        $table .= "</table>";
        
        return $table;
    }
    
    /**
     * Gets the standard match table headers.
     * 
     * @return String 
     */
    public static function getMatchTableHeaders() {
        $headers = array(
            "Player",
            "Hero",
            "Level",
            "K",
            "D",
            "A",
            "Gold",
            "LH",
            "DN",
            "XPM",
            "GPM",
            "Items"
        );
        
        return $headers;
    }
}
?>