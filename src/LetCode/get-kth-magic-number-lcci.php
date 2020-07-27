<?php

/**
 * @param Integer $k
 * @return Integer
 */
function getKthMagicNumber($k) {
    $res = [];
    $res[0] = 1;
    $res[1] = 3;
    $res[2] = 5;
    $res[3] = 7;
}


$res = getKthMagicNumber(5);
var_dump($res);