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

        tunnel($currentX, $currentY, $coordX, $coordY);
    }

    /*
     * Creates a path from currentX and currentY to destinationX and destinationY.
     * The path is made by turning normal wall tiles into floor tiles.
     */

    public function tunnel($currentX, $currentY, $destinationX, $destinationY, &$map) {
        while ($currentX != $destinationX || $currentY != $destinationY) {
            if ($currentX < $destinationX) {
                if (strcmp($map[$currentY][$currentX + 1], "|") == 0) {
                    if (strcmp($map[$currentY + 1][$currentX], "|") == 0) {
                        goAround($currentX, $currentY, "+X");   //Ei valmis vielä
                    }
                } else {
                    $currentX = $currentX + 1;
                    $map[$currentY][$currentX] = ".";
                }
            } else if ($currentX > $destinationX && strcmp($map[$currentY][$currentX - 1], "|") != 0) {
                $currentX = $currentX - 1;
                $map[$currentY][$currentX] = ".";
            } else if ($currentY < $destinationY && strcmp($map[$currentY + 1][$currentX], "|") != 0) {
                $currentY = $currentY + 1;
                $map[$currentY][$currentX] = ".";
            } else if (currentY > $destinationY && strcmp($map[$currentY - 1][$currentX], "|") != 0) {
                $currentY = $currentY - 1;
                $map[$currentY][$currentX] = ".";
            }
        }
    }

    //Ei tarkista seiniä jos tulee vastaan!!!
    public function goAround(&$currentX, &$currentY, $direction, $map) {
        if (strcmp($direction, "+X") == 0) {                                //If the wall is on the right side.
            if (strcmp($map[$currentY + 1][$currentX], "|") == 0) {
                while (strcmp($map[$currentY][$currentX + 1], "|") == 0) {
                    //Testaa törmäys!!!!
                    $map[$currentY + 1][$currentX] = ".";
                    $currentY = $currentY + 1;
                }
            } else if (strcmp($map[$currentY - 1][$currentX], "|") == 0) {
                while (strcmp($map[currentY][$currentX], "|") == 0) {
                    //Testaa törmäys!!!!
                    $map[currentY - 1][$currentX] = ".";
                    $currentY = $currentY - 1;
                }
            }
        } else if (strcmp($direction, "-X") == 0) {                         //If the wall is on the left side.
            if (strcmp($map[$currentY + 1][$currentX], "|") == 0) {
                while (strcmp($map[$currentY][$currentX + 1], "|") == 0) {
                    //Testaa törmäys!!!!
                    $map[$currentY + 1][$currentX] = ".";
                    $currentY = $currentY + 1;
                }
            } else if (strcmp($map[$currentY - 1][$currentX], "|") == 0) {
                while (strcmp($map[currentY][$currentX], "|") == 0) {
                    //Testaa törmäys!!!!
                    $map[currentY - 1][$currentX] = ".";
                    $currentY = $currentY - 1;
                }
            }
        } else if (strcmp($direction, "+Y") == 0) {                         //If the wall is on top of the current tile.
        } else if (strcmp($direction, "-Y") == 0) {                         //If the wall is under the current tile.
        }
    }

}
