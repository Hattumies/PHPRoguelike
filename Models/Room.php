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
    private  $coordX;
    private  $coordY;
    
    function Room($width, $length, $coordX, $coordY) {
        $this->width = $width;
        $this->length = $length;
        $this->coordX = $coordX;
        $this->coordY = $coordY;
        $this->door = 0;
    }
    
    public function getLength() {
        return $this->length;
    }

    public function getWidth() {
        return $this->width;
    }



    public function getCoordX() {
        return $this->coordX;
    }

    public function getCoordY() {
        return $this->coordY;
    }

    public function setLength($length) {
        $this->length = $length;
    }

    public function setWidth($width) {
        $this->width = $width;
    }


    public function setCoordX($coordX) {
        $this->coordX = $coordX;
    }

    public function setCoordY($coordY) {
        $this->coordY = $coordY;
    }



    

}
    
