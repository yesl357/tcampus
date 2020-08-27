<?php

function commonChars($A) {
    $map = [];
    $count = count($A);

    for ($i = 0; $i < $count; $i++) {
        $length = strlen($A[$i]);
        for ($j = 0; $j < $length; $j ++) {
            if (!isset($map[$i][$A[$i][$j]])) {
                $map[$i][$A[$i][$j]] = 0;
            }
            $map[$i][$A[$i][$j]] ++;
        }
    }

    $res = [];
    for ($i = 97; $i <= 122; $i++) {
        $word = chr($i);
//        var_dump($word);
        $min = '';
        for ($j = 0; $j < $count; $j ++) {
            if (!isset($map[$j][$word])) {
                $min = 0;
                break;
            } else {
                if ($min === '') {
                    $min = $map[$j][$word];
                } else {
                    $min = min($map[$j][$word], $min);
                }
            }
        }

        for ($k = 1; $k <= $min; $k++) {
            $res[] = $word;
        }
    }

    return $res;
}

$A = ["cool","lock","cook"];

commonChars($A);