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

    private $length;
    private $width;
    private $door;
    private $doors;
    private $coordX;
    private $coordY;

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
     * Creates a door to the room
     */

    public function createDoor() {
        $door_exists = false;
        $helper1 = NULL;
        $helper2 = NULL;
        $door = NULL;
        $x0 = NULL;
        $x1 = NULL;
        $y0 = NULL;
        $y1 = NULL;

        // Code piece, that randomly decides if wall in question should have a door or not.
        // Code will also determine position of the wall door and then create the corresponding
        // Door object and put it in the array.
        for ($i = 0; $i < 4; $i++) {
            $door = isDoor();

            if ($door === true && $i === 0) {
                $door_exists = true;
                $helper1 = &$this->coordX;
                $helper2 = &$this->length;

                $x0 = &$this->coordX + 1;
                $x1 = $helper1 + $helper2 - 1;
                $y0 = &$this->coordY - 1;
                $y1 = &$this->coordY - 1;
            } else if ($door === true && $i === 1) {
                $door_exists = true;
                $helper1 = &$this->coordX;
                $helper2 = &$this->length;

                $x0 = $helper1 + $helper2 + 1;
                $x1 = $helper1 + $helper2 + 1;
                $helper1 = &$this->width;
                $y0 = &$this->coordY + 1;
                $y1 = $y0 + $helper1;
            } else if ($door === true && $i === 2) {
                $door_exists = true;
                $helper1 = &$this->coordX;
                $helper2 = &$this->length;

                $x0 = &$this->coordX + 1;
                $x1 = $helper1 + $helper2 - 1;
                $helper1 = &$this->width;
                $helper2 = &$this->coordY + 1;
                $y0 = $helper1 + $helper2;
                $y1 = $helper1 + $helper2;
            } else if ($door === true && $i === 3) {
                $door_exists = true;
                $helper1 = &$this->coordX;
                $helper2 = &$this->length;

                $x0 = $helper1 + $helper2 - 1;
                $x1 = $helper1 + $helper2 - 1;
                $helper1 = &$this->width;
                $y0 = &$this->coordY + 1;
                $y1 = $y0 + $helper1;
            }

            if ($x0 != NULL) {
                $door_position = doorPosition($x0, $x1, $y0, $y1);
                $x = $door_position[0];
                $y = $door_position[1];
                $door = new Door($x, $y);
                $this->addDoor($door);

                $x0 = NULL;
                $x1 = NULL;
                $y0 = NULL;
                $y1 = NULL;
            }
        }

        // Piece of code to ensure that there is a door leading to the room.
        if ($door_exists === false) {
            $helper1 = &$this->coordX;
            $helper2 = &$this->length;

            $x0 = &$this->coordX + 1;
            $x1 = $helper1 + $helper2 - 1;
            $y0 = &$this->coordY - 1;
            $y1 = &$this->coordY - 1;

            $door_position = doorPosition($x0, $x1, $y0, $y1);
            $x = $door_position[0];
            $y = $door_position[1];
            $door = new Door($x, $y);
            $this->addDoor($door);
        }
    }

    /*
     * Adds a door to the array $doors.
     */

    public function addDoor(Door $door) {
        $allDoors = &$this->doors;
        $allDoors[sizeof($allDoors)] = $door;
    }

    /*
     *  Appends door to the dungeon map. Addition order is top, right, down, left
     */
    public function drawDoor(&$dungeon_floor, Door $door) {
        $x = $door->getCoordX();
        $y = $door->getCoordY();
        $dungeon_floor[x][y] = "D";
        
        return $dungeon_floor;
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

        $this->createDoor();

        $doors = $this->doors;
        $size = count($doors);

        for ($i = 0; $i < $size; $i++) {
            $door = $doors[$i];
           $dungeon_floor = $this->drawDoor($dungeon_floor, $door);
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
