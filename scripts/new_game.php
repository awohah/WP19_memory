<?php
if (isset($_POST['call_now'])){
	$tiles = array(1,1,2,2,3,3,4,4,5,5,6,6);
	shuffle($tiles);

	// Read cards
 	$json_file_cards = file_get_contents("../data/game.json");
 	$cards = json_decode($json_file_cards, true);

    // Make all cards invisible
    foreach ($cards as $item){
        if($item["id"]==0){
            foreach($item["cards"] as $value){
                $value["visibility"]="invisible";

            }
        }
    };

	// Shuffle pictures
    $i = 0;
    foreach ($cards as $item){
        if($item["id"]==0){
            foreach($item["cards"] as $value){
                $value['picture'] = $tiles[$i];
                $i++;
            }
        }
    }

	// Save to external file
	$json_file_cards = fopen('../data/game.json', 'w');
	fwrite($json_file_cards, json_encode($cards));
	fclose($json_file_cards);
}
?>