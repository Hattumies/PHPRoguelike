<?php
include 'Room.php';
include 'Floor.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FloorTest
 *
 * @author Ilmu
 */

    $floor = new Floor(40, 30,array());
    $floor->addRoom(new Room(1,1,1,1));
    $floor->addRoom(new Room(1,1,4,4));
    $floor->addRoom(new Room(1,1,3,5));
    $floor->addRoom(new Room(1,1,10,5));
    $floor->addRoom(new Room(1,1,10,3));
    
?>
