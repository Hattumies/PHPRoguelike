<?php

include 'Room.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Floor is a single map in the game, it contains rooms and paths.
 *
 * @author Ilmu
 */
class Floor {

    private $floor_map;
    private $rooms;
    private $width;
    private $length;
    private $previous;
    private $next;

    /*
     * The constructor.
     */

    function Floor($width, $length) {
        $this->width = $width;
        $this->length = $length;
        $this->floor_map = $this->dungeonFloor($length, $width);
    }

    // Define and create floor blueprint.
    function dungeonFloor($width, $height) {
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

    /*
     * Method, which draws the room to the floor.
     */

    function drawRoom(Room $room, $floor_map) {
        $x0 = $room->getCoordX();
        $y0 = $room->getCoordY();
        $x1 = $room->getCoordX() + $room->getLength();
        $y1 = $room->getCoordY() + $room->getWidth();
        


        // Draw the room to floor map.
        for ($index = $y0; $index <= $y1; $index++) {
            for ($j = $x0; $j <= $x1; $j++) {
                $floor_map[$index][$j] = ".";
            }
        }
        $this->setMap($floor_map);
    }

    /*
     * Add a room to the floor.
     */

    function addRoom(Room $room) {
        $rooms = &$this->rooms;
        $rooms[sizeof($rooms)] = $room;
    }

    
    /*
     *  Fuction to define and draw room to the dungeon map.
     */
    
    function defineRoom($floor_map) {

        // Room starting point.
        $room_coordinates = roomPosition($floor_map);

        // Room dimensions in a table.
        $room_area = roomArea($floor_map);

        // Room star and ending points.
        $x0 = $room_coordinates[0];
        $x1 = $room_coordinates[0] + $room_area[0];
        $y0 = $room_coordinates[1];
        $y1 = $room_coordinates[1] + $room_area[1];
        
        // Room length and width.
        $length = $x1-$x0;
        $width = $y1-$y0;


        $outofBounds = checkOutOfBound($room_coordinates, $room_area, $floor_map);

        if ($outofBounds === false) {
            $isOverlap = checkRoomPlacement($x0, $y0, $x1, $y1, $floor_map);
            if ($isOverlap === false) {
                $room = new Room($x0, $y0, $length, $width);
             //   $door_count = doorCount();      // Number of doors to be added.
                
                $this->addRoom($room);
                $this->drawRoom($room, $floor_map);
            }
        }

    }
        

   
    
    

    public function getMap() {
        return $this->floor_map;
    }

    public function getRooms() {
        return $this->rooms;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getLength() {
        return $this->length;
    }

    public function getPrevious() {
        return $this->previous;
    }

    public function getNext() {
        return $this->next;
    }

    public function setMap($map) {
        $this->floor_map = $map;
    }

    public function setRooms($rooms) {
        $this->rooms = $rooms;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setLength($length) {
        $this->length = $length;
    }

    public function setPrevious($previous) {
        $this->previous = $previous;
    }

    public function setNext($next) {
        $this->next = $next;
    }

    public function annaKoko() {
        echo sizeof($this->rooms);
    }

}
