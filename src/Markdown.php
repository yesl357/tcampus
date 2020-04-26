<?php

namespace Yesl357\Apidoc;

class Markdown {

    /**
     * 将文档格式转化成apidoc所需要的markdown格式
     * @param $name
     * @param $apiUrl
     * @param $params
     * @param $responseExample
     * @param $responseParams
     * @return string
     */
    public static function transform($name, $apiUrl, $params, $responseExample, $responseParams) {
//        $params = [
//            [
//                'paramName' => 'schoolId',
//                'must' => '1',
//                'type' => 'int',
//                'desc' => '学习id',
//            ]
//        ];
        $request = '';
        foreach ($params as $param) {
            $request .= sprintf('|%s|%s|%s|%s|',
                $param['paramName'],
                $param['paramName'] ? '是' : '否',
                $param['type'],
                $param['desc']
            );
            $request .= PHP_EOL;
        }
//        $responseExample = json_encode([
//            'id' => 1,
//            'name' => 'abcdefg'
//        ]);

//        $responseParams = [
//            [
//                'paramName' => 'schoolId',
//                'type' => 'int',
//                'desc' => '学习id',
//            ]
//        ];

        $response = '';
        foreach ($responseParams as $param) {
            $response .= sprintf('|%s|%s|%s|',
                $param['paramName'],
                $param['type'],
                $param['desc']
            );
            $response .= PHP_EOL;
        }

        $content = <<<string
**简要描述：** 

- $name

**请求URL：** 
- ` $apiUrl `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
$request

 **返回示例**

``` 
  {
    "code": 0,
    "msg": "",
    "content": $responseExample
  }
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
$response
string;


        return $content;
    }

}