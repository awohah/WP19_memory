<?php
if (isset($_POST['call_now'])){
    session_start();
    $tiles = array(1,1,2,2,3,3,4,4,5,5,6,6);
    shuffle($tiles);

    // Read games
    $json_file_cards = file_get_contents("../data/game.json");
    $games = json_decode($json_file_cards, true);

    // Make all cards visible and pictures invisible
    foreach ($games as $game => $game_value) {
        if ($game_value['id'] == ($_SESSION['id'])){
            foreach ($game_value["cards"] as $key => $value) {
                $games[$game]["cards"][$key]['visibility'] = 'visible';
                $games[$game]["cards"][$key]['flip'] = 'invisible';
            }
        }
    };

    // Shuffle pictures
    $i = 0;
    foreach ($games as $game => $game_value) {
        if ($game_value['id'] == ($_SESSION['id'])){
            foreach ($game_value["cards"] as $key => $value) {
                $games[$game]["cards"][$key]['picture'] = $tiles[$i];
                $i++;
            }
        }
    }

    // Save to external file
    $json_file_cards = fopen('../data/game.json', 'w');
    fwrite($json_file_cards, json_encode($games));
    fclose($json_file_cards);
}
?>