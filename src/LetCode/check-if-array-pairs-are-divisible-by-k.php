<?php

function findRepeatedDnaSequences($s) {
    $res = [];

    $count = strlen($s);
    for ($i = 0; $i < $count - 9; $i++) {
        $key = substr($s, $i, 10);
        if (!isset($res[$key])) {
            $res[$key] = 0;
        }
        $res[$key] ++;
    }


    $res = array_keys(array_filter($res, function ($item) {
        return $item > 1;
    }));

}

findRepeatedDnaSequences("AAAAACCCCCAAAAACCCCCCAAAAAGGGTTT");
