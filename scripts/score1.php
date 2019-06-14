<?php
if (isset($_POST['call_now'])){
    session_start();
    // Read games
    $json_file = file_get_contents("../data/game.json");
    $games = json_decode($json_file, true);

    foreach ($games as $key => $value){
        if($value['id'] == ($_SESSION['id'])){
            if($value['round']%2==0){
                $games[$key]['score1'] += 1;
            } else {
                $games[$key]['score2'] += 1;
            }
        }
    };

    // Save to external file
    $json_file = fopen('../data/game.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}
?>