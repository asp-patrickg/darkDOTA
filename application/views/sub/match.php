<div>
    <?php
    //$user = new Dota_User(86720185);
    //$match = new Dota_Match(149914404);
    //$match = new Dota_Match(37626434);
    if(is_null($post['matchID'])) {
        echo "find match";
    } else {
        $session = Session::instance();
        $match = is_null($session->get("match{$post['matchID']}")) ? new Dota_Match($post['matchID']) : $session->get("match{$post['matchID']}");
        
        if($match->radiant_win) {
            echo "<h1 class=\"radiantcolor\">" . strtoupper(Helpers_Strings::getString("WIN_RADIANT")) . "</h1>";
        } else {
            echo "<h1 class=\"direcolor\">" . strtoupper(Helpers_Strings::getString("WIN_DIRE")) . "</h1>";
        }
        
        echo $match->getMatchTable();
    }
    ?>
</div>