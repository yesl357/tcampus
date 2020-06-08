<?php
//堆排序
//最大堆：除了root节点外的所有节点都满足 A[parent(i)] >= A[i]

function left($i) {
    return $i * 2 + 1;
}

function right($i) {
    return 2 * $i + 2;
}

function exchange(&$a, $i, $j) {
    list($ai, $aj) = [$a[$i], $a[$j]];

    $a[$i] = $aj;
    $a[$j] = $ai;
}

//维护最大堆性质
function maxHeapify(&$a, $i, $length) {
    $left = left($i);
    $right = right($i);

    if ($left < $length && $a[$left] > $a[$i]) {
        $largest = $left;
    } else {
        $largest = $i;
    }

    if ($right < $length && $a[$right] > $a[$largest]) {
        $largest = $right;
    }

    if ($largest != $i) {
        exchange($a, $i, $largest);
        maxHeapify($a, $largest, $length);
    }
}

//建堆
function buildMaxHeap(&$a, $length) {
    $start = ceil(count($a) / 2) - 1;
    for ($i = $start; $i >= 0; $i --) {
        maxHeapify($a, $i, $length);
    }
}

//堆排序
function heapSort(&$a, $length) {
    buildMaxHeap($a, $length);

    for ($i = count($a) - 1; $i >= 0; $i--) {
        exchange($a, 0, $i);

        $length--;
        maxHeapify($a, 0, $length);
    }
}


$a = [2,4,7,5,3,1,9,4,2,5,1,2,323,23,242];

heapSort($a, count($a));

var_dump($a);

