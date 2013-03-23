<?php
class Dota_Player {
    var $persona_name;
    var $steam_id;
    var $visibility_state;
    var $profile_state;
    var $last_log_off;
    var $profile_url;
    var $avatar;
    var $avatar_medium;
    var $avatar_full;
    var $persona_state;
    var $real_name;
    var $primary_clan_id;
    var $time_created;
    var $loc_country_code;
    
    public function Player($id) {
        $player = Helpers_Dota::getPlayerSummaries($id);
        
        foreach($player as $p) {
            $this->persona_name = Helpers_Dota::getPlayerDetail($p, 'personaname');
            $this->steam_id = Helpers_Dota::getPlayerDetail($p, 'steamid');
            $this->visibility_state = Helpers_Dota::getPlayerDetail($p, 'communityvisibilitystate');
            $this->profile_state = Helpers_Dota::getPlayerDetail($p, 'profilestate');
            $this->last_log_off = Helpers_Dota::getPlayerDetail($p, 'lastlogoff');
            $this->profile_url = Helpers_Dota::getPlayerDetail($p, 'profileurl');
            $this->avatar = Helpers_Dota::getPlayerDetail($p, 'avatar');
            $this->avatar_medium = Helpers_Dota::getPlayerDetail($p, 'avatarmedium');
            $this->avatar_full = Helpers_Dota::getPlayerDetail($p, 'avatarfull');
            $this->persona_state = Helpers_Dota::getPlayerDetail($p, 'personastate');
            $this->real_name = Helpers_Dota::getPlayerDetail($p, 'realname');
            $this->primary_clan_id = Helpers_Dota::getPlayerDetail($p, 'primaryclanid');
            $this->time_created = Helpers_Dota::getPlayerDetail($p, 'timecreated');
            $this->loc_country_code = Helpers_Dota::getPlayerDetail($p, 'loccountrycode');
        }
    }
    
    public function getPersonaName() {
        return $this->persona_name;
    }
    
    public function getSteamID() {
        return $this->steam_id;
    }
    
    public function getVisibilityState() {
        return $this->visibility_state;
    }
    
    public function getProfileState() {
        return $this->profile_state;
    }
    
    public function getLastLogOff() {
        return $this->last_log_off;
    }
    
    public function getProfileURL() {
        return $this->profile_url;
    }
    
    public function getAvatar() {
        return $this->avatar;
    }
    
    public function getAvatarMedium() {
        return $this->avatar_medium;
    }
    
    public function getAvatarFull() {
        return $this->avatar_full;
    }
    
    public function getPersonaState() {
        return $this->persona_state;
    }
    
    public function getRealName() {
        return $this->real_name;
    }
    
    public function getPrimaryClanID() {
        return $this->primary_clan_id;
    }
    
    public function getTimeCreated() {
        return $this->time_created;
    }
    
    public function getCountryCode() {
        return $this->loc_country_code;
    }
}
?>