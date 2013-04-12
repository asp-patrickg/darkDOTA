<?php
/**
 * Application Strings
 */
define("APP_NAME", "darkDOTA");
define("ANONYMOUS", "Anonymous");
define("WIN_RADIANT", "Radiant Win");
define("WIN_DIRE", "Dire Win");
define("EMPTY", "Empty");
define("RECIPE", "Recipe");

/**
 * Footer Strings
 */
define("FOOTER_01", "Copyright © <a href=\"" . URL::base() . "\">darkDOTA</a>. All rights reserved.");
define("FOOTER_02", "Developed with <a href=\"http://kohanaframework.org/\" target=\"_blank\">Kohana v3.3.0</a>");

class Helpers_Strings {
    /**
     * Function to retrieve a constant with 0-1 arguments.
     * 
     * @param String $key
     * @param String | null $arg
     * @return String 
     */
    public static function getString($key, $arg = null) {
        if(!is_null($arg)) {
            return sprintf(constant($key), $arg);
        } else {
            return constant($key);
        }
    }
    
    /**
     * Function to retrieve a constant with 3 arguments.
     * 
     * @return String 
     */
    public static function getStringWithThreeArgs() {
        $args = func_get_args();
        return sprintf(constant($args[0]), $args[1], $args[2], $args[3]);
    }
}
?>