<div>
    <?php
    $players = Helpers_Dota::getPlayerSummaries(array(86720185, 99601231, 112521018, 99459550));
    
    foreach($players as $player) {
        var_dump($player);
        echo "<br />";
        echo "<br />";
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'personaname'));
        echo "<br />";
    }
    ?>
</div>