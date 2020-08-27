<?php


class Solution {

    /**
     * @param String[][] $tickets
     * @return String[]
     */
    function findItinerary($tickets) {
        $map = [];
        foreach ($tickets as $ticket) {
            if (!isset($map[$ticket[0]])) {
                $map[$ticket[0]] = [];
            }
            $map[$ticket[0]][] = $ticket[1];
        }

        foreach ($map as $key => $item) {
            sort($map[$key]);
        }

//        var_dump($map);die;
        $res = [];
        $this->dfs('JFK', $map, $res);

        return $res;
    }


    function dfs($node, &$map, &$res) {
        while (isset($map[$node]) && count($map[$node]) > 0) {
            $nextNode = array_shift($map[$node]);
            $this->dfs($nextNode, $map, $res);
        }

        array_unshift($res, $node);
    }
}


(new Solution())->findItinerary([["JFK","SFO"],["JFK","ATL"],["SFO","ATL"],["ATL","JFK"],["ATL","SFO"]]);