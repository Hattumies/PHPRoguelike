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
    
    
    public function connect(Door $door1, Door $door2) {
        $currentX = $door1->getCoordX();
        $currentY = $door1->getCoordY();
        $coordX2 = $door2->getCoordX();
        $coordY2 = $door2->getCoordY();
        
        
    }
}
