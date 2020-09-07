<?php
/**
 * trieTree字典树--php实现
 */

//字典树
class TrieTree {
    //根节点
    public $root;

    public function __construct() {
        $this->root = new Node('ROOT');
    }

    public function insert($text) {
        $tree = $this->root;
        $length = mb_strlen($text);
        for ($i = 0; $i < $length; $i++) {
            $index = $value = $text[$i];
            if (!isset($tree->childNode[$index])) {
                $newNode = new Node($value);
                $tree->childNode[$index] = $newNode;
            }
            $tree = $tree->childNode[$index];
        }
        $tree->isEnd = true;
    }

    public function findWord($pattern) {
        $p = $this->root;
        for ($i = 0; $i < mb_strlen($pattern); $i++) {
            $index = $data = $pattern[$i];

            if (empty($p->childNode[$index])) {
                return false;
            }
            $p = $p->childNode[$index];
        }
        if ($p->isEnd == false) {
            return false;
        }
        return true;
    }

    public function delete($text) {

    }


    public function searchString($str) {
        $res = [];
        $length = mb_strlen($str);

        for ($i = 0; $i < $length; $i ++) {
            $tree = $this->root;
            for ($j = $i; $j < $length; $j ++) {
                $index = $value = $str[$j];
                if (!isset($tree->childNode[$index])) {
                    break;
                }

                $tree = $tree->childNode[$index];
                if ($tree->isEnd) {
                    $res[] = [$i, $j];
                }
            }
        }

        return $res;
    }
}

//字典树节点
class Node {
    public $value;                 // 节点值
    public $isEnd = false;        // 是否为结束--是否为某个单词的结束节点
    public $childNode = [];        // 子节点

    public function __construct($value) {
        $this->value = $value;
    }
}


$trieTree = new TrieTree();
$words = ['辱华', '东亚病夫', 'scratch', '傻逼'];
foreach ($words as $word) {
    $trieTree->insert($word);
}

//var_dump($trieTree);
$str = '净朗内容安全产品，是基于小盾安全深度人工智能算法及强大的算力平台，所形成的包含智能文本安全、图像安全、语音安全、视频安全等在内的一站式安全管控平台。标东亚病夫准版功能可提供云端内容风scratch险分析决策，精准识别内容中涉黄、涉政、暴恐、 违禁、广告等多类违规风险，全面协助提升企业智能化、批量化UGC等内容综合处理能力';
$positions = $trieTree->searchString($str);
foreach ($positions as $position) {
    echo sprintf('【%s】出现在第%s至%s个字符之间', mb_substr($str, $position[0], $position[1] - $position[0] + 1), $position[0] + 1, $position[1] + 1).PHP_EOL;
}

new \SplMinHeap();