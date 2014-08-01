<?php
include 'Room.php';
include 'Floor.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Connects doors to each other by making tunnels.
 *
 * @author Ilmu
 */
class TunnelMaker {
    
    
   public function connectDoors(Door $door1, Door $door2, $map) {
        $currentX = $door1->getCoordX();
        $currentY = $door1->getCoordY();
        $coordX = $door2->getCoordX();
        $coordY = $door2->getCoordY();
        
        while($currentX != $coordX || $currentY != $coordY ) {
            tunnel($currentX, $currentY, $coordX, $coordY);
        }
    }
    
    public function tunnel($currentX, $currentY, $destinationX, $destinationY, $map) {
        if($currentX < $destinationX && strcmp($map[$currentY][$currentX + 1], "|") != 0) {
            
        }
    }
}
