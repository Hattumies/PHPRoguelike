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
    private static $map;
    private static $rooms;
    private static $width;
    private static $length;
    private static $previous;
    private static $next;
    
    /*
     * The constructor.
     */
    function Floor($width, $length, $map) {
        self::$width = $width;
        self::$length = $length;
        self::$map = $map;      // TARTKOITUKS OLI VARMAAN $map EIKÄ map?
        self::$rooms[] = array();
   }
   
   /*
    * Add a room to the floor.
    */
   function addRoom($room) {
       global $rooms;
       $rooms[sizeof($rooms)] = $room;
   }
   
   /*
    * Sorts the rooms according to their coordinates.
    */
   function sortRooms() {
       roomMergeSortX($rooms);
       roomMergeSortY($rooms);
   }
   
   /*
    * Merge sort to sort rooms according to theis coordinate on the x-axis.
    * This is used to sort the rooms according to their distance. First the 
    * Rooms are sorted by their x-coordinate and then the y-coordinate.
    * 
    */
   function roomMergeSortX(&$array) {
       $half = sizeof($array) / 2;
       if($half < 2) {
           return;
       }
       $array1 = array_slice($array, 0, $half);
       $array2 = array_slice($array, $half);
       
       roomMergeSortX($array1);
       roomMergeSortX($array2);
       
       if(end($array1) < $array2[0]) {
           $array = array_merge($array1, $array2);
       }
       
       $array = array();
       $index1 = $index2 = 0;
       while($index1 < sizeof($array1) && $index2 < sizeof($array2)) {
           //$room1 = (Room)$array1[$index1];
           if($array1[$index1]->getCoordX() < $array2[$index2]->getCoordX()) {
               $array[] = $array1[$index1++];
           } else {
               $array[] = $array2[$index2++];
           }
       }
       
       while($index1 < sizeof($array1)) { $array[] = $array1[$index1++]; }
       while($index2 < sizeof($array2)) { $array[] = $array2[$index2++]; }
       
   }
   
   /*
    * Function to merge sort rooms according to their coordinate on the y-axis.
    * 
    * Mostly copy paste code, but can't figure out a better way to do this.
    */
    function roomMergeSortY(&$array) {
       $half = sizeof($array) / 2;
       if($half < 2) {
           return;
       }
       $array1 = array_slice($array, 0, $half);
       $array2 = array_slice($array, $half);
       
       roomMergeSortY($array1);
       roomMergeSortY($array2);
       
       if(end($array1) < $array2[0]) {
           $array = array_merge($array1, $array2);
       }
       
       $array = array();
       $index1 = $index2 = 0;
       while($index1 < sizeof($array1) && $index2 < sizeof($array2)) {
           //$room1 = (Room)$array1[$index1];
           if($array1[$index1]->getCoordY() < $array2[$index2]->getCoordY()) {
               $array[] = $array1[$index1++];
           } else {
               $array[] = $array2[$index2++];
           }
       }
       
       while($index1 < sizeof($array1)) { $array[] = $array1[$index1++]; }
       while($index2 < sizeof($array2)) { $array[] = $array2[$index2++]; } 
   }
   
   
   public static function getMap() {
       return self::$map;
   }

   public static function getRooms() {
       return self::$rooms;
   }

   public static function getWidth() {
       return self::$width;
   }

   public static function getLength() {
       return self::$length;
   }

   public static function getPrevious() {
       return self::$previous;
   }

   public static function getNext() {
       return self::$next;
   }

   public static function setMap($map) {
       self::$map = $map;
   }

   public static function setRooms($rooms) {
       self::$rooms = $rooms;
   }

   public static function setWidth($width) {
       self::$width = $width;
   }

   public static function setLength($length) {
       self::$length = $length;
   }

   public static function setPrevious($previous) {
       self::$previous = $previous;
   }

   public static function setNext($next) {
       self::$next = $next;
   }
   
   public function annaKoko() {
       global $rooms;
       echo sizeof($rooms);
   }


   
   
}
