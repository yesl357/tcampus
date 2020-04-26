<?php

namespace Yesl357\Apidoc;

defined('D_S') || define('D_S', DIRECTORY_SEPARATOR);
define('API_ROOT', '.');

class ApiList {

    //获取所有的接口列表
    public function getList() {


    }


    public function listDir($dir) {
        $dir .= substr($dir, -1) == D_S ? '' : D_S;
        $dirInfo = array();
        foreach (glob($dir . '*') as $v) {
            if (is_dir($v)) {
                $dirInfo = array_merge($dirInfo, listDir($v));
            } else {
                $dirInfo[] = $v;
            }
        }
        return $dirInfo;
    }
}