<?php
if (isset($_POST['call_now'])){
    session_start();
    // Read games
    $json_file = file_get_contents("../data/game.json");
    $games = json_decode($json_file, true);
    // Generate HTML
    $cards_html = "";
    if (empty($_SESSION['user'])){
        header("Location: ../index.php");
    }

    // Print each card in the current game with the correct visibility of the tile and the picture
    foreach ($games as $item){
        if($item['id'] == ($_SESSION['id'])){
        	// Only print game board if second user is online
            if(isset($item['user2'])){
                foreach($item["cards"] as $value){
                    $cards_html.= sprintf('<div id="%s" class="tile %s btn btn-info m-1" tile_id="%s" picture="%s">', $value['tile_id'], $value['visibility'], $value['tile_id'], $value['picture']);
                    $cards_html.= sprintf('<div id="%s" class="%s"><img class="images"  src="../img/%s.jpg" align="middle" /></div>', $value['picture'], $value['flip'], $value['picture']);
                    $cards_html.= '</div>';
                }
            }
        }
    };
    // Save html into array
    $export_data = [
        'html' => $cards_html
    ];
    // Return JSON
    header('Content-Type: application/json');
    echo json_encode($export_data);
}
?>