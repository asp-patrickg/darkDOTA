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
        
        $this->players = $match->players;
        $this->season = $match->season;
        $this->radiant_win = $match->radiant_win;
        $this->duration = $match->duration;
        $this->match_seq_num = $match->match_seq_num;
        $this->tower_status_radiant = $match->tower_status_radiant;
        $this->tower_status_dire = $match->tower_status_dire;
        $this->barracks_status_radiant = $match->barracks_status_radiant;
        $this->barracks_status_dire = $match->barracks_status_dire;
        $this->lobby_type = $match->lobby_type;
        $this->leagueid = $match->leagueid;
        $this->positive_votes = $match->positive_votes;
        $this->negative_votes = $match->negative_votes;
        $this->game_mode = $match->game_mode;
    }
    
    public function players() {
        $players = array();
        
        foreach($this->players as $player) {
            $player = new Dota_Player($player);
            $players[] = $player;
        }
        
        return $players;
    }
    
    public function season() {
        return $this->season;
    }
    
    public function radiantWin() {
        return $this->radiant_win;
    }
    
    public function duration() {
        return $this->duration;
    }
    
    public function matchSeqNumber() {
        return $this->match_seq_num;
    }
    
    public function towerStatusRadiant() {
        return $this->tower_status_radiant;
    }
    
    public function towerStatusDire() {
        return $this->tower_status_dire;
    }
    
    public function barracksStatusRadiant() {
        return $this->barracks_status_radiant;
    }
    
    public function barracksStatusDire() {
        return $this->barracks_status_dire;
    }
    
    public function lobbyType() {
        return $this->lobby_type;
    }
    
    public function leagueID() {
        return $this->leagueid;
    }
    
    public function positiveVotes() {
        return $this->positive_votes;
    }
    
    public function negativeVotes() {
        return $this->negative_votes;
    }
    
    public function gameMode() {
        return $this->game_mode;
    }
}
?>