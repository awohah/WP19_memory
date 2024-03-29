<?php

$jsonString = file_get_contents('../data/game.json');
$data = json_decode($jsonString, true);
$elementCount  = count($data);
session_start();

foreach ($data as $key => $value){
    if($value['amount'] < 1 ){
        $id = $data[$key]['id'];
        $data[$key]['amount'] = $value['amount']+1;
        $data[$key]['round'] = 1;
        $data[$key]['user1'] = $_GET['user'];
        $data[$key]['score1'] = 0;
        $_SESSION['id'] = $id;
        header("Location: redirect2.php");

    }elseif($value['amount'] < 2 ){
        $id = $data[$key]['id'];
        $_SESSION['id'] = $id;
        $cards = file_get_contents('../data/cards.json');
        $obj_cards = json_decode($cards);

        //redirect user to game
        header("Location: redirect2.php");

        $data[$key]['amount'] = $value['amount']+1;
        $data[$key]['user2'] = $_GET['user'];
        $data[$key]['score2'] = 0;
        array_push($data, [
            'id' => $id+1,
            'amount' => 0,
            'cards' =>  $obj_cards
        ]);
        $json_file = fopen('../data/game.json', 'w');
        fwrite($json_file, json_encode($data));
        fclose($json_file);
    }
}


$newJsonString = json_encode($data);
file_put_contents('../data/game.json', $newJsonString);
