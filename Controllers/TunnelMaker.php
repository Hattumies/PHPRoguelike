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
                    goAround($currentX, $currentY, "+X");
                } else {
                    $currentX = $currentX + 1;
                    $map[$currentY][$currentX] = ".";
                }
            } else if ($currentX > $destinationX && strcmp($map[$currentY][$currentX - 1], "|") != 0) {
                if (strcmp($map[$currentY][$currentX - 1], "|") == 0) {
                    goAround($currentX, $currentY, "-X");
                } else {
                    $currentX = $currentX - 1;
                    $map[$currentY][$currentX] = ".";
                }
            } else if ($currentY < $destinationY && strcmp($map[$currentY + 1][$currentX], "|") != 0) {
                if (strcmp($map[$currentY + 1][$currentX], "|") == 0) {
                    goAround($currentX, $currentY, "+Y");
                } else {
                    $currentY = $currentY + 1;
                    $map[$currentY][$currentX] = ".";
                }
            } else if (currentY > $destinationY && strcmp($map[$currentY - 1][$currentX], "|") != 0) {
                if (strcmp($map[$currentY - 1][$currentX], "|") == 0) {
                        goAround($currentX, $currentY, "-Y");
                } else {
                $currentY = $currentY - 1;
                $map[$currentY][$currentX] = ".";
                }
            }
        }
    }

    /*
     * This function is used by the tunnel function when tunnel function hits into a wall.
     * GoAround() goes around the wall in the direction given by the $direction parameter.
     * +X and -X for rigth and left and +Y and -Y for up and down.
     */

    public function goAround(&$currentX, &$currentY, $direction, $map) {
        if (strcmp($direction, "+X") == 0) {                                //If the wall is on the right side.
            while (strcmp($map[$currentY][$currentX + 1], "|") == 0) {
                $map[$currentY + 1][$currentX] = ".";
                $currentY = $currentY + 1;
            }
        } else if (strcmp($direction, "-X") == 0) {                         //If the wall is on the left side.
            while (strcmp($map[$currentY][$currentX + 1], "|") == 0) {
                $map[$currentY + 1][$currentX] = ".";
                $currentY = $currentY + 1;
            }
        } else if (strcmp($direction, "+Y") == 0) {                         //If the wall is on top of the current tile.
            while (strcmp($map[$currentY + 1][$currentX], "|") == 0) {
                $map[$currentY][$currentX + 1] = ".";
                $currentX = $currentX + 1;
            }
        } else if (strcmp($direction, "-Y") == 0) {                         //If the wall is under the current tile.
            while (strcmp($map[$currentY - 1][$currentX], "|") == 0) {
                $map[$currentY][$currentX + 1] = ".";
                $currentX = $currentX + 1;
            }
        }
    }

}
