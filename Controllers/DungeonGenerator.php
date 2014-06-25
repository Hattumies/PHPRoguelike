<?php
include 'RandomGenerators.php';
include 'Misc.php';
include 'Room.php';

/**
 * Description of DungeonGenerator
 *
 * @author Teemu Matvejeff
 */
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

/* ******************************* */

// Fuction to draw room to the dungeon map.
function makeRoom($dungeon_area) {
    //Room starting point.
    $room_coordinates = roomPosition(1, 1);
    
    //Room dimensions in a table.
    $room_area[] = roomArea($dungeon_area);
    
    //Room dimensions in variables.
    $room_width = count($room_area[0]);
    $room_height = count($room_area);
    
    //Room star and ending points.
    $room_x0 = $room_coordinates[0];
    $room_x1 = $room_coordinates[0] + $room_width;
    $room_y0 = $room_coordinates[1];
    $room_y1 = $room_coordinates[1] + $room_height;

    // Draw the room to defined Dungeon area.
    for ($index = $room_y0; $index <= $room_y1; $index++) {
        for ($j = $room_x0; $j <= $room_x1; $j++) {
            $dungeon_area[$index][$j] = ".";
        }
    }

    return $dungeon_area;
}

/* ******************************* */

    /*
     * Cheks if there is already a room in the current location.
     */
    function checkRoomPlacement($x0, $y0, $x1, $y1, $map) {
         for($i = $y0;$i < $y1 + 1;$i++) {
            for($j = $x0; $j < $x1 + 1;$j++) {
                if($map[$i][$j] == ".") {
                    return false;
                }
            }
        }
    }

/* ******************************* */

// Function resposible for creation of complete dungeon map.
function makeMap($width, $height) {
    $dungeon_area = dungeonArea($width, $height); //Define dungeon area.
    $dungeon_map = makeRoom($dungeon_area); //Draw the room to the map.
    
    printMap($dungeon_map);
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

    printMap($dungeon);
    makeMap(20, 30);


//$dungeon = createEmptyMap();
//$map = createRoom($dungeon);
//printMap($map);
?>
    </body>
</html>
