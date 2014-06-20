<?php

//GENERAL NOTES
// This file contains all the random generator-functions.


/* * ************************************ */

function roomPosition($max_x, $max_y) {
    $coordinates = array();
    $max_x = 5;
    $max_y = 5;
//        $max_x = $width;
//        $max_y = $height;

    $coordinates[] = rand(1, $max_x - 1);
    $coordinates[] = rand(1, $max_y - 1);

    return $coordinates;
}


// Function that defines the dimensions of to-be-created room.
function roomArea($dungeon_area) {
    $room_area = array();
    $max_x = 8;
    $max_y = 5;

    $room_area[] = rand(2, $max_x);
    $room_area[] = rand(2, $max_y);

    return $room_area;
}
?>


