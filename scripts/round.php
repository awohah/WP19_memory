<?php
if (isset($_POST['call_now'])){
    session_start();
    // Read games
    $json_file = file_get_contents("../data/game.json");
    $games = json_decode($json_file, true);

    foreach ($games as $key => $value){
        if($value['id'] == ($_SESSION['id'])){
            $games[$key]['round'] += 1;
        }
    };

    // Save to external file
    $json_file = fopen('../data/game.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}
?>