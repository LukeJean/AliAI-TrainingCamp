<?php 
require __DIR__ . '/vendor/autoload.php';
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

// Download：https://github.com/aliyun/openapi-sdk-php
// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

AlibabaCloud::accessKeyClient('<key>', '<secret>')
                        ->regionId('cn-shanghai')
                        ->asDefaultClient();
class Face{
    function getExpression(){
        try {
            $result = AlibabaCloud::rpc()
                              ->product('facebody')     //视觉能力，此处imageenhan为使用图像增强能力。
                              ->scheme('http') // https | http
                              ->version('2019-12-30')    //当前API能力的版本，您可以在SDK地址中查看最新的版本。
                              ->action('RecognizeExpression')    //API接口名称，此处为MakeSuperResolutionImage。
                              ->method('POST')
                              ->host('facebody.cn-shanghai.aliyuncs.com')   //外网访问域名，Endpoint。
                              ->options([
                                    'query' => [
                                        'ImageURL' => "https://viapi-test.oss-cn-shanghai.aliyuncs.com/test/facebody/RecognizeBrow/brow.jpg",
                                        ],
                                    ])
                              ->request();
            $backResult = $result->toArray();
        
            return $backResult;
        } catch (ClientException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }
    }

    //场景识别
    function getImagerecog(){
        try {
            $result = AlibabaCloud::rpc()
                              ->product('imagerecog')
                              ->scheme('http')
                              ->version('2019-09-30')
                              ->action('RecognizeScene')
                              ->method('POST')
                              ->host('imagerecog.cn-shanghai.aliyuncs.com')
                              ->options([
                                    'query' => [
                                        'RegionId' => "cn-shanghai",
                                        'ImageURL' => "https://viapi-demo.oss-cn-shanghai.aliyuncs.com/viapi-demo/images/DetectImageElements/detect-elements-src.png"
                                        ],
                                    ])
                              ->request();
            $backResult = $result->toArray();
        
            return $backResult;
        } catch (ClientException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }
    }
}

$face = new Face();
    $expression= $face->getImagerecog();
    var_dump($expression);
//     $face = $idCard->getFace();
//     var_dump($face);
