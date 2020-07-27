<?php

/**
 * @param Integer[] $asteroids
 * @return Integer[]
 */
function asteroidCollision($asteroids) {
    $stack1 = $stack2 = [];

    foreach ($asteroids as $asteroid) {
        if ($asteroid > 0) {
            array_push($stack1, $asteroid);
        } else {
            array_push($stack2, $asteroid);

            while (1) {
                if (count($stack1) == 0) {
                    break;
                }
                if (abs($asteroid) > end($stack1)) {
                    array_pop($stack1);
                    continue;
                } elseif (abs($asteroid) < end($stack1)) {
                    array_pop($stack2);
                    break;
                } else {
                    array_pop($stack2);
                    array_pop($stack1);
                    break;
                }
            }
        }
    }

    $res = [];
    foreach ($stack2 as $item) {
        $res[] = $item;
    }

    foreach ($stack1 as $item) {
        $res[] = $item;
    }

    return $res;
}


$asteroids = [8, -8];
var_dump(asteroidCollision($asteroids));