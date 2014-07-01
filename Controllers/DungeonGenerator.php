<?php
include 'RandomGenerators.php';
include 'Misc.php';
include 'Room.php';

/**
 * Description of DungeonGenerator
 *
 * @author Teemu Matvejeff
 */

/* * ****************************** */

/* ******************************* */
class DungeonGenerator {
   


// Define the borders of dungeon.
function dungeonArea($width, $height) {
    $dungeon_area = array();

    // Code segment to generate Dungeon area.
    for ($index = 0; $index < $height; $index++) {
        $row = array();
        for ($j = 0; $j < $width; $j++) {
            $row[$j] = "#";
        }
        $dungeon_area[$index] = $row;
    }

    return $dungeon_area;
}

/* * ****************************** */


// Method, which draws the room to the Dungeon area-map.
function drawRoom($x0, $y0, $x1, $y1, $dungeon_area) {
    // Draw the room to defined Dungeon area.
    for ($index = $y0; $index <= $y1; $index++) {
        for ($j = $x0; $j <= $x1; $j++) {
            $dungeon_area[$index][$j] = "0";
        }
    }
    
    return $dungeon_area;
}

/* * ****************************** */

// Fuction to create a room.
//function makeRoom($dungeon_area) {
//    $outofBounds = false;
//    $isOverlap = false;
//    $room_x0 = 0;
//    $room_x1 = 0;
//    $room_y0 = 0;
//    $room_y1 = 0;
//}

// Fuction to draw room to the dungeon map.
function makeRoom($dungeon_area) {

    //Room starting point.
    $room_coordinates = roomPosition($dungeon_area);

    //Room dimensions in a table.
    $room_area = roomArea($dungeon_area);

    //Room star and ending points.
    $room_x0 = $room_coordinates[0];
    $room_x1 = $room_coordinates[0] + $room_area[0];
    $room_y0 = $room_coordinates[1];
    $room_y1 = $room_coordinates[1] + $room_area[1];


    $outofBounds = checkOutOfBound($room_coordinates, $room_area, $dungeon_area);

    if ($outofBounds == false) {
        $isOverlap = checkRoomPlacement($room_x0, $room_y0, $room_x1, $room_y1, $dungeon_area);
        if ($isOverlap == false) {
            $dungeon_area = drawRoom($room_x0, $room_y0, $room_x1, $room_y1, $dungeon_area);
    }
    
        }

    // Draw the room to defined Dungeon area.
    for ($index = $room_y0; $index <= $room_y1; $index++) {
        for ($j = $room_x0; $j <= $room_x1; $j++) {
            $dungeon_area[$index][$j] = ".";

        }
    }

    
    return $dungeon_area;
}

/* * ****************************** */

// Check if room is completely inside Dungeon area.
function checkOutOfBound($room_coordinates, $room_area, $dungeon_area) {
    // Calculations for Dungeon size.
    $dungeon_max_X = count($dungeon_area[0]);
    $dungeon_max_Y = count($dungeon_area);

    // Calculations for room end point coordinates
    $room_end_X = $room_coordinates[0] + $room_area[0];
    $room_end_Y = $room_coordinates[1] + $room_area[1];

    // Check if room is partially outside of Dungeon area.
    // If outside, return true, else return false.
    if ($room_end_X >= $dungeon_max_X || $room_end_Y >= $dungeon_max_Y) {
        return true;
    } else {
        return false;
    }
}

/* * ****************************** */
/*
 * Checks if there is already a room in the current location.
 */

function checkRoomPlacement($x0, $y0, $x1, $y1, $map) {
    
    for ($i = $y0; $i < $y1+1; $i++) {
        for ($j = $x0; $j < $x1+1; $j++) {
            if ($map[$i][$j] == ".") {
                return true;
            }
        }
    }

    return false;
}

/* * ****************************** */

// Function resposible for creation of complete dungeon map.
function makeMap($width, $height) {
    $dungeon_area = dungeonArea($width, $height); //Define dungeon area.
    $room_count = roomCount(); // Number of rooms to be drawn.

    for ($indeksi = 0; $indeksi < $room_count; $indeksi++) { 
        $dungeon_area = makeRoom($dungeon_area); //Draw the room to the map.
    }

    printMap($dungeon_area);
}



}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        makeMap(20, 30);
        

        ?>
    </body>
</html>
