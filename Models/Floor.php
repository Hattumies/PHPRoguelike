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

    private $map;
    private $rooms;
    private $width;
    private $length;
    private $previous;
    private $next;

    /*
     * The constructor.
     */

    function Floor($width, $length, $map) {
        $this->width = $width;
        $this->length = $length;
        $this->map = $map;
    }

    /*
     * Add a room to the floor.
     */

    function addRoom(Room $room) {
        $rooms = &$this->rooms;
        $rooms[sizeof($rooms)] = $room;
    }

    /*
     * Sorts the rooms according to their coordinates.
     */
    function sortRooms() {
        global $rooms;
        if (count($rooms) > 1) {
            roomMergeSortX($rooms);
            roomMergeSortY($rooms);
        }
    }

    /*
     * Merge sort to sort rooms according to theis coordinate on the x-axis.
     * This is used to sort the rooms according to their distance. First the 
     * Rooms are sorted by their x-coordinate and then the y-coordinate.
     * 
     */

    function roomMergeSortX(&$array) {
        $half = sizeof($array) / 2;
        if ($half < 2) {
            return;
        }
        $array1 = array_slice($array, 0, $half);
        $array2 = array_slice($array, $half);

        roomMergeSortX($array1);
        roomMergeSortX($array2);

        if (end($array1) < $array2[0]) {
            $array = array_merge($array1, $array2);
        }

        $array = array();
        $index1 = $index2 = 0;
        while ($index1 < sizeof($array1) && $index2 < sizeof($array2)) {
            //$room1 = (Room)$array1[$index1];
            if ($array1[$index1]->getCoordX() < $array2[$index2]->getCoordX()) {
                $array[] = $array1[$index1++];
            } else {
                $array[] = $array2[$index2++];
            }
        }

        while ($index1 < sizeof($array1)) {
            $array[] = $array1[$index1++];
        }
        while ($index2 < sizeof($array2)) {
            $array[] = $array2[$index2++];
        }
    }

    /*
     * Function to merge sort rooms according to their coordinate on the y-axis.
     * 
     * Mostly copy paste code, but can't figure out a better way to do this.
     */

    function roomMergeSortY(&$array) {
        $half = sizeof($array) / 2;
        if ($half < 2) {
            return;
        }
        $array1 = array_slice($array, 0, $half);
        $array2 = array_slice($array, $half);

        roomMergeSortY($array1);
        roomMergeSortY($array2);

        if (end($array1) < $array2[0]) {
            $array = array_merge($array1, $array2);
        }

        $array = array();
        $index1 = $index2 = 0;
        while ($index1 < sizeof($array1) && $index2 < sizeof($array2)) {
            //$room1 = (Room)$array1[$index1];
            if ($array1[$index1]->getCoordY() < $array2[$index2]->getCoordY()) {
                $array[] = $array1[$index1++];
            } else {
                $array[] = $array2[$index2++];
            }
        }

        while ($index1 < sizeof($array1)) {
            $array[] = $array1[$index1++];
        }
        while ($index2 < sizeof($array2)) {
            $array[] = $array2[$index2++];
        }
    }

    public function getMap() {
        return $this->map;
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
        $this->map = $map;
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
