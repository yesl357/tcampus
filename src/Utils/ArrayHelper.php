<?php

namespace Yesl357\Apidoc\Utils;

class ArrayHelper
{
    /**
     * php-二分算法
     * e.g. sort($arr); dichotomy($arr, $searchNumber, 0, count($arr) - 1)
     * @param $arr array an Array of sorted
     * @param $number mixed the number of need search
     * @param $start int the start index of array
     * @param $end int the end key of array
     * @return false|float|int
     */
    public static function dichotomy($arr, $number, $start, $end) {

        if ($start > $end) {
            return -1;
        }

        $middle = ceil(($start + $end) / 2);
        if ($arr[$middle] == $number) {
            return $middle;
        } elseif ($arr[$middle] < $number) {
            return self::dichotomy($arr, $number, $middle + 1, $end);
        } else {
            return self::dichotomy($arr, $number, $start, $middle - 1);
        }
    }
}