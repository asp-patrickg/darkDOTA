<?php
class Dota_Match {
    var $match_id;
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
        
        $this->match_id = $id;
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
        
        $session = Session::instance();
        $session->set("match{$id}", $this);
    }
    
    public function matchID() {
        return $this->match_id;
    }
    
    public function players() {
        $players = array();
        
        foreach($this->players as $player) {
            $session = Session::instance();
            if(is_null($session->get("player{$this->match_id}{$player->account_id}"))) {
                $pl = new Dota_Player($player);
                $players[] = $pl;
                $session->set("player{$this->match_id}{$player->account_id}", $pl);
            } else {
                $players[] = $session->get("player{$this->match_id}{$player->account_id}");
            }
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
    
    public function getMatchTable() {
        $data = array();
        $players = $this->players();
        foreach($players as $player) {
            $row = array(
                'player' => $player->user->persona_name,
                'player_avatar' => $player->user->avatar,
                'hero' => Helpers_Dota::getHeroName($player->hero_id),
                'hero_image' => Helpers_Dota::getHeroImage($player->hero_id, false),
                'level' => $player->level,
                'kills' => $player->kills,
                'deaths' => $player->deaths,
                'assists' => $player->assists,
                'gold' => $player->gold,
                'last_hits' => $player->last_hits,
                'denies' => $player->denies,
                'xp_per_min' => $player->xp_per_min,
                'gold_per_min' => $player->gold_per_min,
                'items' => "TO-DO"
            );

            $data[] = $row;
        }
        
        return Helpers_Util::getMatchTable(Helpers_Util::getMatchTableHeaders(), $data);
    }
}
?>