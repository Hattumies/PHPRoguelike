<?php
include 'RandomGenerators.php';
include 'Misc.php';
include '../Models/Floor.php';
//include '../Models/Room.php';

/**
 * Description of DungeonGenerator
 *
 * @author Teemu Matvejeff
 */
/* * ****************************** */

/* * ****************************** */


    /*     * ****************************** */

// Check if room is completely inside Dungeon area.
    function checkOutOfBound($room_coordinates, $room_area, $dungeon_area) {
        // Calculations for Dungeon size.
        $dungeon_max_X = count($dungeon_area[0]) - 1;
        $dungeon_max_Y = count($dungeon_area) - 1;

        // Calculations for room end point coordinates
        $room_end_X = $room_coordinates[0] + $room_area[0];
        $room_end_Y = $room_coordinates[1] + $room_area[1];

        // Check if room is partially outside of Dungeon area.
        // If outside, return true, else return false.
        if (!($room_end_X >= $dungeon_max_X) && !($room_end_Y >= $dungeon_max_Y)) {
            return false;
        } else {
            return true;
        }
    }

    /*     * ****************************** */
    /*
     * Checks if there is already a room in the current location.
     */

    function checkRoomPlacement($x0, $y0, $x1, $y1, $map) {

        for ($i = $y0; $i < $y1 + 1; $i++) {
            for ($j = $x0; $j < $x1 + 1; $j++) {
                if ($map[$i][$j] === "0") {
                    return true;
                }
            }
        }

        return false;
    }

    /*     * ****************************** */

// Function resposible for creation of complete dungeon map.
    function makeMap($width, $height) {
        $floor = new Floor($height, $width);
//        $room = new Room(5, 5, 5, 5);
//        $map = $floor->getMap();
//        $floor->drawRoom($room, $map);

        $room_count = roomCount(); // Number of rooms to be drawn.
        
        $dungeon_floor = $floor->getMap();
        
        
        for ($indeksi = 0; $indeksi < $room_count; $indeksi++) {
            $floor->defineRoom($dungeon_floor);
            $dungeon_floor = $floor->getMap();
        }


        printMap($dungeon_floor);
    }


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
    makeMap(100, 200);
?>
    </body>
</html>
