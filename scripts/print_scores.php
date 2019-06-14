<?php
if (isset($_POST['call_now'])){
    session_start();
    // Read cards
    $json_file = file_get_contents("../data/game.json");
    $cards = json_decode($json_file, true);
    // Generate HTML
    $cards_html = "";
    if (empty($_SESSION['user'])){
        header("Location: index.php");
    }

    foreach ($cards as $item){
        if($item['id'] == ($_SESSION['id'])){
            if(isset($item['user2'])){
                $cards_html.= sprintf('<div>Round: %s</div>', $item['round']);
                $cards_html.= sprintf('<div>Score %s: %s</div>', $item['user1'], $item['score1']);
                $cards_html.= sprintf('<div>Score %s: %s</div>', $item['user2'], $item['score2']);
                    if($item['score1']+$item['score2']==6) {
                        $cards_html.= sprintf('<div>Game over</div>');
                        if($item['score1'] > $item['score2']) {
                            $cards_html.= sprintf('<div>%s won!</div>', $item['user1']);
                        } else {
                            $cards_html.= sprintf('<div>%s won!</div>', $item['user2']);
                        }
                    }
            } else {
                $cards_html.= sprintf('<h3>But first, please wait for another user</h3>');
            };
        
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