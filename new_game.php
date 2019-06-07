<?php
if (isset($_POST['call_now'])){
	$tiles = array(1,1,2,2,3,3,4,4,5,5,6,6);
	shuffle($tiles);

	// Read cards
 	$json_file_cards = file_get_contents("../data/cards.json");
 	$cards = json_decode($json_file_cards, true);
	
	// Make all cards invisible
	foreach ($cards as $key => $value){
		$cards[$key]['visibility'] = "invisible";
	};

	// Shuffle pictures
	$i = 0;
	foreach ($cards as $key => $value){
		$cards[$key]['picture'] = $tiles[$i];
		$i++;
	};

	// Save to external file
	$json_file_cards = fopen('../data/cards.json', 'w');
	fwrite($json_file_cards, json_encode($cards));
	fclose($json_file_cards);
}
?>