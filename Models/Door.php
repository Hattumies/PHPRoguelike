<?php

/* 
 * The class for creating instances of doors.
 */
class Door {
    Private $coordX;
    Private $coordY;
    private $open;
    
    /*
     * The constructor. It ceates a door that has the given coordinates and sets is shut.
     */
    function Door(int $x, int $y) {
        $this->coordX = $x;
        $this->coordY = $y;
        $this->open = false;
    }
    
    
    public function getCoordX() {
        return $this->coordX;
    }

    public function getCoordY() {
        return $this->coordY;
    }

    public function getOpen() {
        return $this->open;
    }

    public function setCoordX($coordX) {
        $this->coordX = $coordX;
    }

    public function setCoordY($coordY) {
        $this->coordY = $coordY;
    }

    public function open() {
        $this->open = true;
    }
    
    public function close() {
        $this->open = false;
    }


}
?>