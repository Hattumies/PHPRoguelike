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
    var $length;
    var $width;
    var $door;
    var $coord;
    
    function Room($width, $length, $coord) {
        self::$width = $width;
        self::$length = $length;
        self::$coord = $coord;
        self::$door = false;
    }
}
