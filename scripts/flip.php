<?php
if (isset($_POST['image'])){
    session_start();
    // Read cards
    $json_file = file_get_contents("../data/game.json");
    $cards = json_decode($json_file, true);

    // Make tile visible
    foreach ($cards as $game => $game_value) {
        if ($game_value['id'] == ($_SESSION['id'])){
            foreach ($game_value["cards"] as $key => $value) {
                if ($value['image'] == $_POST['image']) {
                    $cards[$game]["cards"][$key]['flip'] = "visible";
                }
            }
        }
    };

    // Save to external file
    $json_file = fopen('../data/game.json', 'w');
    fwrite($json_file, json_encode($cards));
    fclose($json_file);
}
?>