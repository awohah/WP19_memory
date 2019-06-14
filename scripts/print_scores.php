<?php
if (isset($_POST['call_now'])){
    session_start();
    // Read games
    $json_file = file_get_contents("../data/game.json");
    $cards = json_decode($json_file, true);
    // Generate HTML
    $scores_html = "";
    if (empty($_SESSION['user'])){
        header("Location: index.php");
    }
    // Print status of game and user feedback
    foreach ($cards as $item){
        if($item['id'] == ($_SESSION['id'])){
            if(isset($item['user2'])){
                // If user2 is present in game.json, print game status so users know they can start
                if($item['round']%2==0){
                    $scores_html.= sprintf("<div class='turn'>It's %s's turn</div>", $item['user2']);
                } else {
                    $scores_html.= sprintf("<div class='turn'>It's %s's turn</div>", $item['user1']);
                };
                $scores_html.= sprintf('<div id="round">Round: %s</div>', $item['round']);
                $scores_html.= sprintf('<div class="score">Score %s: %s</div>', $item['user1'], $item['score1']);
                $scores_html.= sprintf('<div class="score">Score %s: %s</div>', $item['user2'], $item['score2']);
                    // If the total score equals 6, all tiles have been matched, so end result will be printed
                    if($item['score1']+$item['score2']==6) {
                        $scores_html.= sprintf('<div id="game_over">Game over</div>');
                        if($item['score1'] > $item['score2']) {
                            $scores_html.= sprintf('<div class="won">%s won!</div>', $item['user1']);
                        } if else ($item['score2'] > $item['score1']) {
                            $scores_html.= sprintf('<div class="won">%s won!</div>', $item['user2']);
                        } else {
                            $scores_html.= sprintf("<div class='won'>It's a tie!</div>");
                        }
                    }
            } else {
                // Let user know when there is no second player yet
                $scores_html.= sprintf('<h3 id="wait">But first, please wait for another user</h3>');
            };
        }
    };
    // Save html into array
    $export_data = [
        'html' => $scores_html
    ];
    // Return JSON
    header('Content-Type: application/json');
    echo json_encode($export_data);
}
?>