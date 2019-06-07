<?php
if (isset($_POST['call_now'])){
    // Read cards
    $json_file = file_get_contents("../data/cards.json");
    $cards = json_decode($json_file, true);
    // Generate HTML
    $cards_html = "";
    foreach($cards as $key => $value){
        $cards_html.= sprintf('<div  id="%s" class="tile btn btn-info m-1 p-1" style="padding-left:1px;" tile_id="%s"  >', $value['tile_id'], $value['tile_id']);
        $cards_html.= sprintf('<div id="%s" class="%s"><img src="../fp/img/%s.jpg" style="width:180px;height:140px;" /></div>', $value['picture'], $value['visibility'], $value['picture']);
        $cards_html.= '</div>';
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