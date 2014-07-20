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
    
    //Size of the room could be scaled in respect to the size of the dungeon area...
    $max_length = 12;
    $max_width = 8;

    $room_area[] = rand(5, $max_length);
    $room_area[] = rand(5, $max_width);


    return $room_area;
}

// A function to decide how many rooms Dungeon has.
function roomCount() {
    $rooms = rand(5, 12);

    return $rooms;
}
?>


