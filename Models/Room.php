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
    private static $length;
    private static $width;
    private static $door;
    private static $coordX;
    private static $coordY;
    
    function Room($width, $length, $coordX, $coordY) {
        self::$width = $width;
        self::$length = $length;
        self::$coordX = $coordX;
        self::$coordY = $coordY;
        self::$door = 0;
    }
    
    public static function getLength() {
        return self::$length;
    }

    public static function getWidth() {
        return self::$width;
    }

    public static function getDoor() {
        return self::$door;
    }

    public static function getCoordX() {
        return self::$coordX;
    }

    public static function getCoordY() {
        return self::$coordY;
    }

    public static function setLength($length) {
        self::$length = $length;
    }

    public static function setWidth($width) {
        self::$width = $width;
    }

    public static function setDoor($door) {
        self::$door = $door;
    }

    public static function setCoordX($coordX) {
        self::$coordX = $coordX;
    }

    public static function setCoordY($coordY) {
        self::$coordY = $coordY;
    }

    

}
    
