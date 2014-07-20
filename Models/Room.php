<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class is for creating and using room objects. They are mostly used when
 * creating maps.
 *
 * @author Ilmu
 * 
 */
class Room {
    private  $length;
    private  $width;
    private  $door;
    private  $doors;
    private  $coordX;
    private  $coordY;
    
    /*
     * The constructor. Takes the width and the length of the room and the x- and y-coordinates
     * of the rooms upper left corner as arguments.
     */
    function Room($coordX, $coordY, $length, $width) {
        $this->width = $width;
        $this->length = $length;
        $this->coordX = $coordX;
        $this->coordY = $coordY;
        $this->doors = array();
        $this->door = 0;
    }
    
    /*
     * Adds a door to the array $doors.
     */
    public function addDoor(Door $door) {
        $allDoors = &$this->doors;
        $allDoors[sizeof($allDoors)] = $door;
    }
    
    // Method, which draws the room to the Dungeon area-map.
    public function drawRoom(&$dungeon_floor) {
        global $coordX;
        global $coordY;
        global $length;
        global $width;
        
        $x0 = $coordX;
        $y0 = $coordY;
        $x1 = $coordX + $length;
        $y1 = $coordY + $width;
        
    // Draw the room to defined Dungeon area.
    for ($index = $y0; $index <= $y1; $index++) {
        for ($j = $x0; $j <= $x1; $j++) {
            $dungeon_floor[$index][$j] = "0";
        }
    }
    
    return $dungeon_floor;
}

    // Return room length
    public function getLength() {
        return $this->length;
    }

    // Return room width
    public function getWidth() {
        return $this->width;
    }



    // Return X-coordinate that is used to define room placement in the map
    public function getCoordX() {
        return $this->coordX;
    }

    // Return Y-coordinate that is used to define room placement in the map
    public function getCoordY() {
        return $this->coordY;
    }

    // Set room length (X-axis)
    public function setLength($length) {
        $this->length = $length;
    }

    // Set room width (Y-axis)
    public function setWidth($width) {
        $this->width = $width;
    }


    // Set X-coordinate that is used to define room placement in the map
    public function setCoordX($coordX) {
        $this->coordX = $coordX;
    }

    // Set Y-coordinate that is used to define room placement in the map
    public function setCoordY($coordY) {
        $this->coordY = $coordY;
    }



    

}
    
