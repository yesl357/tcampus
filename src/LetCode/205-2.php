<?php

class Solution {

    public $alice = [];
    public $bob = [];

    public $n1 = 0;
    public $n2 = 0;

    public $path = [
        1 => 0,
        2 => 0,
        3 => 0
    ];

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function maxNumEdgesToRemove($n, $edges) {
        $grid = $grid2 = [];
        $n1 = $n2 = $n3 = 0;
        foreach ($edges as $edge) {
            if ($edge[0] == 1) {
                if (!isset($grid[$edge[1]][$edge[2]])) {
                    $grid[$edge[1]][$edge[2]] = $edge[0];
                    $grid[$edge[2]][$edge[1]] = $edge[0];
                }
                $n1 ++;
            }

            if ($edge[0] == 2) {
                if (!isset($grid2[$edge[1]][$edge[2]])) {
                    $grid2[$edge[1]][$edge[2]] = $edge[0];
                    $grid2[$edge[2]][$edge[1]] = $edge[0];
                }
                $n2 ++;
            }

            if ($edge[0] == 3) {
                $grid2[$edge[1]][$edge[2]] = $edge[0];
                $grid2[$edge[2]][$edge[1]] = $edge[0];
                $grid1[$edge[1]][$edge[2]] = $edge[0];
                $grid1[$edge[2]][$edge[1]] = $edge[0];
                $n3++;
            }
        }


        $this->dfs(1, $grid);
        if ($this->n1 != $n) {
            return -1;
        }
        $this->dfs2(1, $grid2);
        if ($this->n2 != $n) {
            return -1;
        }

        return $n1-$this->path[1] + $n2-$this->path[2];
    }


    function dfs($v, $grid) {
        $this->n1 ++;
        $this->alice[$v] = 1;
        if (!isset($grid[$v])) {
            return -1;
        }
        arsort($grid[$v]);
        foreach ($grid[$v] as $u => $type) {
            if (isset($this->alice[$v])) {
                continue;
            }

            $this->path[$type] ++;
            $this->dfs($u, $grid);
        }
    }

    function dfs2($v, $grid) {
        $this->n2 ++;
        $this->bob[$v] = 1;
        if (!isset($grid[$v])) {
            return -1;
        }
        arsort($grid[$v]);
        foreach ($grid[$v] as $u => $type) {
            if (isset($this->bob[$v])) {
                continue;
            }

            $this->path[$type] ++;
            $this->dfs2($u, $grid);
        }
    }
}

(new Solution())->maxNumEdgesToRemove(4, [[3,1,2],[3,2,3],[1,1,3],[1,2,4],[1,1,2],[2,3,4]]);