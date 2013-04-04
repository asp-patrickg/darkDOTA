<?php
class Dota_Player {
    var $user;
    var $account_id;
    var $player_slot;
    var $hero_id;
    var $item_0;
    var $item_1;
    var $item_2;
    var $item_3;
    var $item_4;
    var $item_5;
    var $kills;
    var $deaths;
    var $assists;
    var $leaver_status;
    var $gold;
    var $last_hits;
    var $denies;
    var $gold_per_min;
    var $xp_per_min;
    var $gold_spent;
    var $hero_damage;
    var $tower_damage;
    var $hero_healing;
    var $level;
    
    public function __construct($player) {
        $this->user = new Dota_User($player->account_id);
        $this->account_id = $player->account_id;
        $this->player_slot = $player->player_slot;
        $this->hero_id = $player->hero_id;
        $this->item_0 = $player->item_0;
        $this->item_1 = $player->item_1;
        $this->item_2 = $player->item_2;
        $this->item_3 = $player->item_3;
        $this->item_4 = $player->item_4;
        $this->item_5 = $player->item_5;
        $this->kills = $player->kills;
        $this->deaths = $player->deaths;
        $this->assists = $player->assists;
        $this->leaver_status = $player->leaver_status;
        $this->gold = $player->gold;
        $this->last_hits = $player->last_hits;
        $this->denies = $player->denies;
        $this->gold_per_min = $player->gold_per_min;
        $this->xp_per_min = $player->xp_per_min;
        $this->gold_spent = $player->gold_spent;
        $this->hero_damage = $player->hero_damage;
        $this->tower_damage = $player->tower_damage;
        $this->hero_healing = $player->hero_healing;
        $this->level = $player->level;
    }
    
    public function user() {
        return $this->user;
    }
    
    public function accountID() {
        return $this->account_id;
    }
    
    public function playerSlot() {
        return $this->player_slot;
    }
    
    public function heroID() {
        return $this->hero_id;
    }
    
    public function items() {
        $items = array(
            $this->item_0,
            $this->item_1,
            $this->item_2,
            $this->item_3,
            $this->item_4,
            $this->item_5
        );
        
        return $items;
    }
    
    public function kills() {
        return $this->kills;
    }
    
    public function deaths() {
        return $this->deaths;
    }
    
    public function assists() {
        return $this->assists;
    }
    
    public function leaverStatus() {
        return $this->leaver_status;
    }
    
    public function gold() {
        return $this->gold;
    }
    
    public function lastHits() {
        return $this->last_hits;
    }
    
    public function denies() {
        return $this->denies;
    }
    
    public function goldPerMinute() {
        return $this->gold_per_min;
    }
    
    public function xpPerMinute() {
        return $this->xp_per_min;
    }
    
    public function goldSpent() {
        return $this->gold_spent;
    }
    
    public function heroDamage() {
        return $this->hero_damage;
    }
    
    public function towerDamage() {
        return $this->tower_damage;
    }
    
    public function heroHealing() {
        return $this->hero_healing;
    }
    
    public function level() {
        return $this->level;
    }
}
?>