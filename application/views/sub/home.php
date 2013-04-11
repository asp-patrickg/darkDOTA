<div>
    <?php
    //$user = new Dota_User(86720185);
    //$match = new Dota_Match(149914404);
    $session = Session::instance();
    $id = 37626434;
    $match = is_null($session->get("match{$id}")) ? new Dota_Match($id) : $session->get("match{$id}");
    
    echo $match->getMatchTable();
    ?>
</div>