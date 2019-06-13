<?php
if (isset($_POST['round'])){
    session_start();
    // Read games
    $json_file = file_get_contents("../data/game.json");
    $games = json_decode($json_file, true);


    foreach ($games as $game => $game_value) {
        if ($game_value['id'] == ($_SESSION['id'])){
            $games[$game]["round"] = $game_value['round']+1;               
            }
        }
    };

    // Save to external file
    $json_file = fopen('../data/game.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}
?>