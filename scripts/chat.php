<?php $json_file = file_get_contents("../data/chat.json");
$old_messages = json_decode($json_file, true);
$old_messages = array_reverse($old_messages);

session_start();

foreach ($old_messages as $key => $value){
    if ($value['user'] == $_SESSION['user']) {
        echo "<div id='row-data' class='text_user'>";
        echo "<span id='time'>" . $value['time'] . "</span>";
        echo "<span id='name-text'>" . $value['user'] . ":</span>";
        echo "<div id='text-msg'>" . $value['text'] . "</div>";
        echo "</div>";
    }else{
        echo "<div id='row-data' class='text_stranger'>";
        echo "<span id='time'>" . $value['time'] . "</span>";
        echo "<span id='name-text'>" . $value['user'] . ":</span>";
        echo "<div id='text-msg'>" . $value['text'] . "</div>";
        echo "</div>";
    }
}
?>