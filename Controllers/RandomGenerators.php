<?php

//GENERAL NOTES
// This file contains all the random generator-functions.


/* * ************************************ */

function roomPosition($dungeon_area) {
    $coordinates = array();
    $width = count($dungeon_area[0]);
    $height = count($dungeon_area);

    $max_x = $width - 1;
    $max_y = $height - 1;

    $coordinates[] = rand(1, $max_x);
    $coordinates[] = rand(1, $max_y);

    return $coordinates;
}

// Function that defines the dimensions of to-be-created room.
function roomArea($dungeon_area) {
    $room_area = array();
    $max_x = 6;
    $max_y = 6;

    $room_area[] = rand(2, $max_x);
    $room_area[] = rand(2, $max_y);


    return $room_area;
}

// A function to decide how many rooms Dungeon has.
function roomCount() {
    $rooms = rand(3, 5);

    return $rooms;
}
?>


