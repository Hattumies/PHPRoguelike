<?php
include '../Models/Floor.php';
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
$floor = new Floor(40, 30, array());
$huone = new Room(1,1,1,1);
$floor->addRoom($huone);
$floor->addRoom(new Room(1, 1, 4, 4));
$floor->addRoom(new Room(1, 1, 3, 5));
$floor->addRoom(new Room(1, 1, 10, 5));
$floor->addRoom(new Room(1, 1, 10, 3));


//Oma koodi alkaa
$floor->sortRooms();
$huoneet = $floor->getRooms();

$y = $huoneet[4]->getCoordY();
echo $y;
//Oma koodi loppuu


//$floor->annaKoko();
//echo sizeof($floor->getRooms());
//var_dump(get_object_vars($floor));

?>
