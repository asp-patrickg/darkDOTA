<div>
    <?php
    $players = Helpers_Dota::getPlayerSummaries(array(86720185, 99601231, 112521018, 99459550));
    
    foreach($players as $player) {
        var_dump(Helpers_Dota::getPlayerDetail($player, 'personaname'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'steamid'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'communityvisibilitystate'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'profilestate'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'lastlogoff'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'profileurl'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'avatar'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'avatarmedium'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'avatarfull'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'personastate'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'realname'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'primaryclanid'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'timecreated'));
        echo "<br />";
        var_dump(Helpers_Dota::getPlayerDetail($player, 'loccountrycode'));
        echo "<br />";
        
        echo "<br />";
        echo "<br />";
        
        echo "<br />";
    }
    ?>
</div>