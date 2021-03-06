<?php

//GENERAL NOTES
// This is file for all miscellaneous functions created for the game.


/***************************************/


//Function to print dungeon map as well as printing 2+-D arrays.
function printMap(&$dungeon_map) {
    $height = count($dungeon_map);
    $width = count($dungeon_map[0]);
    
    for ($index = 0; $index < $height; $index++) {
        $rivi = "";
        for ($j = 0; $j < $width; $j++) {
            $mark = $dungeon_map[$index][$j];
            $rivi = $rivi . $mark;
        }
        print $rivi."<br>";
    }
}

// 1-D Array printing function for testing purposes.
function printArray(&$array) {
    $size = count($array);
    
    for ($index = 0; $index < $size; $index++) {
        $number = $array[$index];
        print $number."<br>";
    }
}


?>