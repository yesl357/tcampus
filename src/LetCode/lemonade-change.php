<?php

function lemonadeChange($bills) {
    $five = 0;
    $ten = 0;
    $twenty = 0;

    while (count($bills) > 0) {
        $bill = array_shift($bills);

        if ($bill == 5) {
            $five ++;
            continue;
        }

        if ($bill == 10) {
            $ten ++;
            $five --;
            if ($five < 0) {
                return false;
            }
            continue;
        }

        if ($bill == 20) {
            $twenty ++;
            if ($ten > 0) {
                $ten --;
                $five --;
            } else {
                $five -= 3;
            }

            if ($five < 0) {
                return false;
            }
            continue;
        }
    }

    return true;
}

$a = lemonadeChange([5,5,5,10,20]);
var_dump($a);die;