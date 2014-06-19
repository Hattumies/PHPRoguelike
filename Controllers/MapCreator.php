<?php

class MapCreator {

    private $map = array();
    
    
    /*
     * Creates an empty map.
     */
    function createEmptyMap() {
        $map = array();
        for ($i = 0; $i < 50; $i++) {
            for ($j = 0; $j < 20; $j++) {
                $map[$i][$j] = "*";
            }
        }
        return $map;
    }
    
    /*
     * Creates a room and calls checkRoomPlacement to check if the room to be
     * created can be placed on the map. Corrently it is possible to create rooms
     * that go outside the map.
     * 
     */
    function createRoom($map) {
        $length = rand(2, 5);
        $heigth = rand(2,5);
        $x = rand(0,49);
        $y = rand(0,19);
        
        while(checkRoomPlacement($x, $y, $map) == false) {
            $x = rand(0,49);
            $y = rand(0,19);
        }
        
        for($i = $x;$i < $length + 1;$i++) {
            for($j = $y; $j < $heigth + 1;$j++) {
                $map[$i][$j] = ".";
            }
        }
        
    }
    
    /*
     * Cheks if there is already a room in the current location.
     */
    function checkRoomPlacement($x, $y, $length, $heigth, $map) {
         for($i = $x;$i < $length + 1;$i++) {
            for($j = $y; $j < $heigth + 1;$j++) {
                if($map[$i + " " + $j] == ".") {
                    return false;
                }
            }
        }
    }

}

?>