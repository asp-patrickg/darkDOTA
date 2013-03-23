<?php
define("STEAM_ID_UPPER_32_BITS", "00000001000100000000000000000001");

class Helpers_Dota {
    /**
     * Gets the Steam Web API Key from
     * 
     * Domain Name: dokgu
     * 
     * @return String
     */
    private static function getKey() {
        return "92F4BF7FABFF40DA1F0BDA16ABF12AF9";
    }
    
    /**
     * Make the Web API call with provided parameters.
     * 
     * @param String $cat
     * @param String $cmd
     * @param String $ver
     * @param array $args
     * @return String 
     */
    private static function call($cat, $cmd, $ver, $args = array()) {
        $key = Helpers_Dota::getKey();
        
        $url = "https://api.steampowered.com/{$cat}/{$cmd}/{$ver}/?key={$key}";
        
        if(is_array($args)) {
            foreach($args as $k => $v) {
                $url .= "&{$k}={$v}";
            }
        }
        
        return Helpers_Util::curl($url);
    }
    
    /**
     * Gets the latest 25 public matches.
     * 
     * Possible parameters:
     * 
     * player_name=<name>             # Search matches with a player name, exact match only 
     * hero_id=<id>                   # Search for matches with a specific hero being played (hero ID, not name)
     * game_mode=<mode>               # Search for matches of a given mode
     * skill=<skill>                  # 0 for any, 1 for normal, 2 for high, 3 for very high skill (default is 0)
     * date_min=<date>                # date in UTC seconds since Jan 1, 1970 (unix time format) 
     * date_max=<date>                # date in UTC seconds since Jan 1, 1970 (unix time format)
     * min_players=<count>            # the minimum number of players required in the match
     * account_id=<id>                # Search for all matches for the given user (32-bit or 64-bit steam ID)
     * league_id=<id>                 # matches for a particular league
     * start_at_match_id=<id>         # Start the search at the indicated match id, descending
     * matches_requested=<n>          # Maximum is 25 matches (default is 25)
     * tournament_games_only=<string> # set to only show tournament games
     * 
     * @param array $args
     * @return Object
     */
    public static function getMatchHistory($args = array()) {
        $response = Helpers_Dota::call("IDOTA2Match_570", "GetMatchHistory", "V001", $args);
        $response = json_decode($response);
        
        return $response;
    }
    
    /**
     * Gets the matches from a match history object.
     * 
     * @param Object $match_history
     * @return array 
     */
    public static function getMatchesFromHistory($match_history) {
        if(property_exists($match_history, 'result')) {
            $result = $match_history->result;

            if(property_exists($result, 'matches')) {
                $matches = $result->matches;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
    /**
     * Gets the database of heroes (updated) and stores it in the session object.
     */
    private static function getHeroesDatabase() {
        $args = array(
            "language" => "en_us"
        );
        
        $response = Helpers_Dota::call("IEconDOTA2_570", "GetHeroes", "v0001", $args);
        $response = json_decode($response);
        
        if(property_exists($response, 'result')) {
            $result = $response->result;

            if(property_exists($result, 'heroes')) {
                $session = Session::instance();
                if($session->get('heroes') == null) {
                    $session->set('heroes', $result->heroes);
                }
            }
        }
    }
    
    /**
     * Gets the local name of a hero based on the ID.
     * 
     * @param int $id
     * @return String 
     */
    public static function getHeroName($id) {
        //We check if the heroes database has already been loaded on the session.
        $session = Session::instance();
        
        if($session->get('heroes') == null) {
            Helpers_Dota::getHeroesDatabase();
        }
        
        $heroes = $session->get('heroes');
        
        foreach($heroes as $hero) {
            if($hero->id == $id) {
                return $hero->localized_name;
            }
        }
        
        return "No Hero";
    }
    
    /**
     * Gets the name of the lobby type.
     * 
     * @param int $id
     * @return String 
     */
    public static function getLobbyTypeName($id) {
        switch ($id) {
            case -1:
                return "Invalid";
                break;
            case 0:
                return "Public Matchmaking";
                break;
            case 1:
                return "Practice";
                break;
            case 2:
                return "Tournament";
                break;
            case 3:
                return "Tutorial";
                break;
            case 4:
                return "Co-op with Bots";
                break;
            case 5:
                return "Team Match";
                break;
        }
    }
    
    /**
     * Gets the details of a match.
     * 
     * @param int $match_id
     * @return Object 
     */
    public static function getMatchDetails($match_id) {
        $args = array(
            "match_id" => $match_id
        );
        
        $response = Helpers_Dota::call("IDOTA2Match_570", "GetMatchDetails", "V001", $args);
        $response = json_decode($response);
        
        return $response;
    }
    
    /**
     * Gets the leaver status text.
     * 
     * @param int $id
     * @return String 
     */
    public static function getLeaverStatusMessage($id) {
        switch ($id) {
            case 0:
                return "Finished";
                break;
            case 1:
                return "Safe to Leave";
                break;
            case 2:
                return "Abandoned";
                break;
            case null:
                return "Bot";
                break;
        }
    }
    
    /**
     * Gets the name of the game mode.
     * 
     * @param int $id
     * @return String 
     */
    public static function getGameModeName($id) {
        switch ($id) {
            case 1:
                return "All Pick";
                break;
            case 2:
                return "Captains Mode";
                break;
            case 3:
                return "Random Draft";
                break;
            case 4:
                return "Single Draft";
                break;
            case 5:
                return "All Random";
                break;
            case 6:
                return "?? INTRO/DEATH ??";
                break;
            case 7:
                return "The Diretide";
                break;
            case 8:
                return "Reverse Captains Mode";
                break;
            case 9:
                return "Greeviling";
                break;
            case 10:
                return "Tutorial";
                break;
            case 11:
                return "Mid Only";
                break;
            case 12:
                return "Least Played";
                break;
            case 13:
                return "New Player Pool";
                break;
        }
    }
    
    /**
     * Transforms a 64-bit Steam ID into a 32-bit Steam ID.
     * 
     * @param int $id_64
     * @return String 
     */
    private static function get32BitSteamID ($id_64) {
        if(!is_string($id_64)) {
            Helpers_Dota::steamIDToString($id_64);
        }
        
        $upper = gmp_mul(bindec(STEAM_ID_UPPER_32_BITS), "4294967296");
        
        return gmp_strval(gmp_sub($id_64, $upper));
    }
    
    /**
     * Transforms a 32-bit Steam ID into a 64-bit Steam ID.
     * 
     * @param int $id_32
     * @param boolean $hi
     * @return String 
     */
    private static function get64BitSteamID ($id_32, $hi = false ) {
        if(!is_string($id_32)) {
            Helpers_Dota::steamIDToString($id_32);
        }
        
        if($hi === false) {
            $hi = bindec(STEAM_ID_UPPER_32_BITS);
        }

        $hi = sprintf("%u", $hi);
        $id_32 = sprintf("%u", $id_32);

        return gmp_strval(gmp_add(gmp_mul($hi, "4294967296"), $id_32));      
    }
    
    /**
     * Transforms the Steam ID as a String.
     * 
     * @param int $id
     * @return String 
     */
    private static function steamIDToString($id) {
        return "" . $id . "";
    }
    
    /**
     * Gets the details of a player or players.
     * 
     * @param array $ids
     * @return array 
     */
    public static function getPlayerSummaries($ids = array()) {
        $ids_string = "";
        
        if(is_array($ids)) {
            for($i = 0; $i < count($ids); $i++) {
                $ids_string .= Helpers_Dota::get64BitSteamID($ids[$i]);

                if($i < (count($ids) - 1)) {
                    $ids_string .= ",";
                }
            }
        } else {
            $ids_string .= Helpers_Dota::get64BitSteamID($ids);
        }
        
        $args = array(
            "steamids" => $ids_string
        );
        
        $response = Helpers_Dota::call("ISteamUser", "GetPlayerSummaries", "v0002", $args);
        $response = json_decode($response);
        
        $players = Helpers_Dota::getPlayersArray($response);
        
        return $players;
    }
    
    /**
     * Gets the array of players with their details.
     * 
     * @param type $object
     * @return array 
     */
    private static function getPlayersArray($object) {
        if(is_object($object)) {
            if(property_exists($object, 'response')) {
                $response = $object->response;

                if(property_exists($response, 'players')) {
                    return $response->players;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
    /**
     * Gets a specific detail from a player object.
     * 
     * Possible details:
     *      steamid
     *      communityvisibilitystate
     *      profilestate
     *      personaname
     *      lastlogoff
     *      commentpermission
     *      profileurl
     *      avatar
     *      avatarmedium
     *      avatarfull
     *      personastate
     *      primaryclanid
     *      timecreated
     *      loccountrycode
     * 
     * @param Object $player
     * @param String $detail 
     * @return String | int
     */
    public static function getPlayerDetail($player, $detail) {
        if(is_object($player)) {
            if(property_exists($player, $detail)) {
                return $player->$detail;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
?>