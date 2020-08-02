<?php


/**
 * @param Integer[] $arr
 * @param Integer $k
 * @return Integer
 */
function getWinner($arr, $k) {
    $winTimes = 0;
    $winNum = $arr[0];
    $count = count($arr);

    if ($k >= $count - 1) {
        rsort($arr);
        return $arr[0];
    }

    $queue = array_slice($arr, 1);
    $index = 0;
    while ($winTimes < $k) {
        $b = $queue[$index];

        if ($winNum > $b) {
            $winTimes ++;
            array_push($queue, $b);
        } else {
            $winTimes = 1;
            array_push($queue, $winNum);
            $winNum = $b;
        }
        $index++;
    }

    return $winNum;
}

/**
 * @param Integer[][] $grid
 * @return Integer
 */
function minSwaps($grid) {
    $n = count($grid);

    $tmp = [];
    for ($i = 0; $i < $n; $i ++) {
        $zero = 0;
        for ($j = $n - 1; $j >= 0; $j --) {
            if ($grid[$i][$j] == 1) {
                break;
            }
            $zero ++;
        }

        $tmp[$i] = $zero;
    }

    //冒泡
    $step = 0;

//    var_dump($tmp);die;
    for ($i = 0; $i < $n; $i++) { //该层循环用来控制每轮 冒出一个数 需要比较的次数
        $k = $i;
        for ($k = $i; $k < $n; $k++) {
            if ($tmp[$k] >= $n - $i - 1) {
                break;
            }
        }
        echo "{$i}--{$k} \n";
        if ($k == $n) {
            return -1;
        }

        for ($j = $k; $j > $i; $j--) {
            swap($tmp, $j, $j - 1);
//            var_dump($tmp);
            $step ++;
        }
    }

    var_dump($step);
    return $step;
}


function swap(&$tmp, $i, $j) {
    $a = $tmp[$i];
    $tmp[$i] = $tmp[$j];
    $tmp[$j] = $a;
}

$grid = [[0,0,1],[1,1,0],[1,0,0]];
minSwaps($grid);