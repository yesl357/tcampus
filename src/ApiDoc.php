<?php

namespace Yesl357\Apidoc;

//用户对应user；项目-item；文档-page
class ApiDoc {

    //账号。密码登陆
    public $username = '1520683535@qq.com';
    public $password = 'asd123321222';
    public $serverUrl = 'http://api-doc.sjhh-inner.com/server/index.php?s=';
    public $token = '';

    //首页的item_id-项目id
    public $itemId = 0;
    public $pageId = 0;

    public function __construct() {

    }

    /**
     * 登陆api-doc
     * @return $this
     */
    public function login() {
        $url = $this->serverUrl.'/api/user/login';
        $data = [
            'username' => $this->username,
            'password' => $this->password,
            'code' => '',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        // POST数据
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        // 把post的变量加上
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);

        $arr = explode(PHP_EOL, $output);

        $cookieToken = '';
        foreach ($arr as $header) {
            if (strstr($header, 'Set-Cookie: cookie_token=')) {
                //截取cookie_token
                $start = strlen('Set-Cookie: cookie_token=');
                $cookieToken = substr($header, $start, strpos($header, ';') - $start);
            }
        }

        $this->token = $cookieToken;
        return $this;
    }

    /**
     * 设置item_id
     * @param $itemId
     * @return $this
     */
    public function setItemId($itemId) {
        $this->itemId = $itemId;
        return $this;
    }

//    public function set

    //保存接口
    public function save() {
        $url = $this->serverUrl.'/api/page/save';

        $data = [
            'item_id' => $this->itemId,
            'page_id' => $this->pageId,     //文档ID，如果未设置，则默认0-新增
            's_number' => '',               //版本号，一般不填
            'page_title' => '文档标题',
            'page_content' => '222',
            'cat_id' => 0,                   //所属目录
        ];

        $ch = curl_init();
        $header = ['Cookie: cookie_token='.$this->token];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        // POST数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // 把post的变量加上
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);


        var_dump($output);
        die;
    }


    /**
     * 接口名称1-接口描述
     * @param int schoolId 1 学校ID
     * @param string name 0 姓名
     * @example {"id":1}
     * @reutrn int schoolId 学校ID
     * @reutrn int schoolId 学校ID
     */
    public function actionTee() {

    }
}