<?php

class Solution {

    /**
    * @param Integer $n
    * @param Integer[][] $connections
    * @return Integer
    */
    function makeConnected($n, $connections) {
        $count = count($connections);
        if ($n - 1 > $count) {
            return -1;
        }

        //init the graph
        $graph = [];
        $isConnected = [];
        for ($i = 0; $i < $n; $i++) {
            $graph[$i]['neighbors'] = [];
            $isConnected[$i] = 0;
        }
        foreach ($connections as $connection) {
            $graph[$connection[0]]['neighbors'][] = $connection[1];
            $graph[$connection[1]]['neighbors'][] = $connection[0];
        }

        $res = 0;
        for ($i = 0; $i < $n; $i++) {
            if (!$isConnected[$i]) {
                $res++;
                $this->dfs($i, $graph, $isConnected);
            }
        }

        return $res - 1;
    }

    function dfs($i, $graph, &$isConnected) {
        $isConnected[$i] = 1;
//        $tmp = array_diff($graph[$i]['neighbors'], $isConnected);
        foreach ($graph[$i]['neighbors'] as $neighbor) {
            if (!$isConnected[$neighbor]) {
                $this->dfs($neighbor, $graph, $isConnected);
            }

        }
    }

}

$n = 49600;
$connections = [];

(new Solution())->makeConnected($n, $connections);