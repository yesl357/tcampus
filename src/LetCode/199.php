<?php


/**
 * @param String $s
 * @param Integer[] $indices
 * @return String
 */
function restoreString($s, $indices) {

    $res = [];
    $length = strlen($s);
    for ($i = 0; $i < $length; $i++) {
        $res[$i] = '';
    }

    for ($i = 0; $i < $length; $i++) {
        $res[$indices[$i]] = $s[$i];
    }

    return implode('', $res);
}

/**
 * @param String $target
 * @return Integer
 */
function minFlips($target) {
    $length = strlen($target);

    $count = 0;
    for ($i = 0; $i < $length; $i++) {
        if ($count == 0 && $target[$i] == '0') {
            continue;
        }

        if ($i == 0 && $target[$i] == '1') {
            $count ++;
            continue;
        }

        if ($i > 0 && $target[$i] != $target[$i - 1]) {
            $count ++;
        }
    }

    return $count;
}

//$s = "codeleet"; $indices = [4,5,6,7,0,2,1,3];
//
//var_dump(restoreString($s, $indices));


var_dump(minFlips('001011101'));