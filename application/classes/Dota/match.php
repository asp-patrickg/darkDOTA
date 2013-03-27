<?php
class Dota_Match {
    var $players;
    var $season;
    var $radiant_win;
    var $duration;
    var $match_seq_num;
    var $tower_status_radiant;
    var $tower_status_dire;
    var $barracks_status_radiant;
    var $barracks_status_dire;
    var $lobby_type;
    var $leagueid;
    var $positive_votes;
    var $negative_votes;
    var $game_mode;
    
    public function __construct($id) {
        $match = Helpers_Dota::getMatchDetails($id);
        
        $this->players = $match['players'];
        $this->season = $match['season'];
        $this->radiant_win = $match['radiant_win'];
        $this->duration = $match['duration'];
        $this->match_seq_num = $match['match_seq_num'];
        $this->tower_status_radiant = $match['tower_status_radiant'];
        $this->tower_status_dire = $match['tower_status_dire'];
        $this->barracks_status_radiant = $match['barracks_status_radiant'];
        $this->barracks_status_dire = $match['barracks_status_dire'];
        $this->lobby_type = $match['lobby_type'];
        $this->leagueid = $match['leagueid'];
        $this->positive_votes = $match['positive_votes'];
        $this->negative_votes = $match['negative_votes'];
        $this->game_mode = $match['game_mode'];
    }
}
?>