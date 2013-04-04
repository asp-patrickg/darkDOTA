<div>
    <?php
    //$user = new Dota_User(86720185);
    //$match = new Dota_Match(149914404);
    $match = new Dota_Match(149914404);
    $players = $match->players();
    foreach($players as $player) {
        echo "<img src=\"" . Helpers_Dota::getHeroImage($player->hero_id, false) . "\" alt=\"" . Helpers_Dota::getHeroName($player->hero_id) . "\" title=\"" . Helpers_Dota::getHeroName($player->hero_id) . "\" />";
        echo "<br />";
        echo "<img src=\"{$player->user->avatar}\" /> {$player->user->persona_name}";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        
    }
    ?>
</div>