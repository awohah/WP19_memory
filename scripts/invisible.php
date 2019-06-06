<?php
if (isset($_POST['tile_id'])){
	// Read cards
 	$json_file = file_get_contents("../data/cards.json");
 	$cards = json_decode($json_file, true);
	
	// Make tile invisible
	foreach ($cards as $key => $value){
		if ($value['tile_id'] == $_POST['tile_id']){
			$cards[$key]['visibility'] = "invisible";
		}
	}

	// Save to external file
	$json_file = fopen('../data/cards.json', 'w');
	fwrite($json_file, json_encode($cards));
	fclose($json_file);
}