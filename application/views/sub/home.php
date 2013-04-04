<div>
    <?php
    //$user = new Dota_User(86720185);
    //$match = new Dota_Match(149914404);
    $match = new Dota_Match(149914404);
    $players = $match->players();
    foreach($players as $player) {
        if($player->account_id == "86720185") {
            var_dump($player);
            echo "<img src=\"" . Helpers_Dota::getHeroImage($player->hero_id, false) . "\" alt=\"" . Helpers_Dota::getHeroName($player->hero_id) . "\" title=\"" . Helpers_Dota::getHeroName($player->hero_id) . "\" />";
            echo "<img src=\"{$player->user->avatar}\" />";
        }
    }
    ?>
</div>