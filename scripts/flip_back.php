<?php
if (isset($_POST['tile_id'])){
    session_start();
    // Read games
    $json_file = file_get_contents("../data/game.json");
    $games = json_decode($json_file, true);

    // Make picture invisible
    foreach ($games as $game => $game_value) {
        if ($game_value['id'] == ($_SESSION['id'])){
            foreach ($game_value["cards"] as $key => $value) {
                if ($value['tile_id'] == $_POST['tile_id']) {
                    $games[$game]["cards"][$key]['flip'] = 'invisible';
                }
            }
        }
    };

    // Save to external file
    $json_file = fopen('../data/game.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}
?>