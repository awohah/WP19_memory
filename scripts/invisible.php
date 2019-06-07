<?php
if (isset($_POST['tile_id'])){
	// Read cards
 	$json_file = file_get_contents("../data/game.json");
 	$cards = json_decode($json_file, true);
	
	// Make tile invisible
    foreach ($cards as $item) {
        if ($item["id"] == 0) {
            foreach ($item["cards"] as $value) {
                if ($value['tile_id'] == $_POST['tile_id']) {
                    $value['visibility'] = "invisible";
                }
            }
        }
    };

	// Save to external file
	$json_file = fopen('../data/game.json', 'w');
	fwrite($json_file, json_encode($cards));
	fclose($json_file);
}