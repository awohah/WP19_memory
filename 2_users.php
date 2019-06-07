<?php

$jsonString = file_get_contents('data/game.json');
$data = json_decode($jsonString, true);
$elementCount  = count($data);

foreach ($data as $key => $value){
    if($value['amount'] < 1 ){
        $id = $data[$key]['id'];
        $data[$key]['amount'] = $value['amount']+1;
        $data[$key]['user1'] = $_GET['user'];
        header("Location: redirect2.php?id=$id");

    }elseif($value['amount'] < 2 ){
        $id = $data[$key]['id'];
        $cards = file_get_contents('data/cards.json');
        $obj_cards = json_decode($cards);

        //redirect user to game
        header("Location: redirect2.php?id=$id");

        $data[$key]['amount'] = $value['amount']+1;
        $data[$key]['user2'] = $_GET['user'];
        array_push($data, [
            'id' => $id+1,
            'amount' => 0,
            'cards' =>  $obj_cards
        ]);
        $json_file = fopen('data/game.json', 'w');
        fwrite($json_file, json_encode($data));
        fclose($json_file);
    }

    if($elementCount>11){
        header("Location: play.php?game=full");
    }
}


$newJsonString = json_encode($data);
file_put_contents('data/game.json', $newJsonString);
