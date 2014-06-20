<?php
include 'RandomGenerators.php';
include 'Misc.php';

/**
 * Description of DungeonGenerator
 *
 * @author Teemu Matvejeff
 */
/* ******************************* */
// Define the borders of dungeon.
function dungeonArea($width, $height) {
    $dungeon_area = array();

    // Code segment to generate Dungeon area.
    for ($index = 0; $index < $height; $index++) {
        $row = array();
        for ($j = 0; $j < $width; $j++) {
            $row[$j] = "X";
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
            $dungeon_area[$index][$j] = "0";
        }
    }

    return $dungeon_area;
}

/* ******************************* */

// Function to ensure that generated rooms don´t overlap.
function doesOverlap($corner_x, $corner_y, $dungeon_area, $width, $height) {
    $overlap = true;

    for ($index = 0; $index < $height; $index++) {
        for ($j = 0; $j < $width; $j++) {
            
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



?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
//    $dungeon = dungeonArea(20, 30);
//    printMap($dungeon);
    makeMap(20, 30);
?>
    </body>
</html>
