<?php $json_file = file_get_contents("data/chat.json");
$old_messages = json_decode($json_file, true);
$old_messages = array_reverse($old_messages);

foreach ($old_messages as $key => $value){
    echo "<div id='row-data'>";
    echo "<span id='time'>".$value['time']."</span>";
    echo "<span id='name-text'>".$value['user'].":</span>";
    echo "<span id='text-msg'>".$value['text']."</span><br>";
    echo "</div>";
}
?>