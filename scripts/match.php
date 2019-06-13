<?php

if (isset($_POST['source1'])) {
    session_start();
    $src1 = $_POST['source1'];
    $array = explode(",", $src1);


    print_r($array);

    $comb1 = ["7", "11"];
    $comb2 = ["1", "5"];
    $comb3 = ["2", "9"];
    $comb4 = ["12", "6"];
    $comb5 = ["8", "3"];
    $comb6 = ["4", "10"];

    if (count($array) === 2) {
        $new_array = [$array[0], $array[1]];
        if ($new_array === $comb1 || $new_array === $comb2 || $new_array === $comb3 || $new_array === $comb4 || $new_array === $comb5 || $new_array === $comb6) {

        }
    }
}

// als ze matchen visibility naar invisble zetten
