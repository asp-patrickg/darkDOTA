<div>
    <?php
    //$user = new Dota_User(86720185);
    //$match = new Dota_Match(149914404);
    $match = new Dota_Match(37626434);
    $players = $match->players();
    $data = array();
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
    
    echo Helpers_Util::getTable(Helpers_Util::getMatchTableHeaders(), $data);
    ?>
</div>