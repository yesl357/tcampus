<?php
class TreeNode {
     public $val = null;
     public $left = null;
     public $right = null;
     public $parent = null;
     function __construct($val = 0, $left = null, $right = null) {
         $this->val = $val;
         $this->left = $left;
         $this->right = $right;
     }
}

class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $distance
     * @return Integer
     */
    function countPairs($root, $distance) {
        $length = count($root);

        //init the tree
        $tree = [];
        for ($i = 0; $i < $length; $i ++) {
            $treeNode = new TreeNode($root[$i], $i * 2 + 1, $i * 2 + 2);
            $tree[$i] = $treeNode;
        }
        for ($i = 0; $i < $length; $i ++) {
            if ($tree[$i]->left < $length) {
                $tree[$tree[$i]->left]->parent = $i;
            }
            if ($tree[$i]->right < $length) {
                $tree[$tree[$i]->right]->parent = $i;
            }
        }

        //找到所有的子节点 + 判断距离？
        $leafs = [];
        foreach ($tree as $key => $treeNode) {
            if ($treeNode->val != null) {
                if ((!isset($root[$treeNode->left]) && !isset($root[$treeNode->right])) || ($root[$treeNode->left] == null && $root[$treeNode->right] == null))
                $leafs[] = $key;
            }
        }
//        var_dump($leafs);die;
        $count = count($leafs);

        $res = 0;
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                $distanceOfTwoLeaf = $this->distance($tree, $leafs[$i], $leafs[$j]);
                if ($distanceOfTwoLeaf <= $distance) {
                    $res++;
                }
            }
        }

        var_dump($res);
        return $res;
    }


    function distance($tree, $leaf1, $leaf2) {
        $path1 = $path2 = [];

        while (1) {
            if ($tree[$leaf1]->parent !== null) {
                $path1[] = $tree[$leaf1]->parent;
                $leaf1 = $tree[$leaf1]->parent;
            } else {
                break;
            }
        }

        while (1) {
            if ($tree[$leaf2]->parent !== null) {
                $path2[] = $tree[$leaf2]->parent;
                $leaf2 = $tree[$leaf2]->parent;
            } else {
                break;
            }
        }

        $pathLength1 = count($path1) - 1;
        $pathLength2 = count($path2) - 1;
        $count = 0;

        while (1) {
            if (!isset($path1[$pathLength1]) || !isset($path2[$pathLength2])) {
                break;
            }
            if ($path1[$pathLength1] == $path2[$pathLength2]) {
                $pathLength1--;
                $pathLength2--;
                $count ++;
            } else {
                break;
            }
        }

        return (count($path1) - $count + 1) + (count($path2) - $count + 1);
    }
}

$root = [100];
//$root = [1,2,3,null,4];
//$root = [7,1,4,6,null,5,3,null,null,null,null,null,2];
$distance = 3;

(new Solution())->countPairs($root, $distance);