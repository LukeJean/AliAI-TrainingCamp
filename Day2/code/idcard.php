<?php 
require __DIR__ . '/vendor/autoload.php';
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

// Download：https://github.com/aliyun/openapi-sdk-php
// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

AlibabaCloud::accessKeyClient('<your appkey>', '<your appsecret>')
                        ->regionId('cn-shanghai')
                        ->asDefaultClient();
class IDCard{
    function getBack(){
        try {
            $result = AlibabaCloud::rpc()
                              ->product('ocr')     //视觉能力，此处imageenhan为使用图像增强能力。
                              ->scheme('http') // https | http
                              ->version('2019-12-30')    //当前API能力的版本，您可以在SDK地址中查看最新的版本。
                              ->action('RecognizeIdentityCard')    //API接口名称，此处为MakeSuperResolutionImage。
                              ->method('POST')
                              ->host('ocr.cn-shanghai.aliyuncs.com')   //外网访问域名，Endpoint。
                              ->options([
                                    'query' => [
                                        'ImageURL' => "<oss链接，必须是阿里的华东区(上海)>",
                                        'Side' => "back"
                                        ],
                                    ])
                              ->request();
            $backResult = $result->toArray();
        
            return $backResult['Data'];
        } catch (ClientException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }
    }

    function getFace(){
        try {
            $result = AlibabaCloud::rpc()
                              ->product('ocr')     //视觉能力，此处imageenhan为使用图像增强能力。
                              ->scheme('http') // https | http
                              ->version('2019-12-30')    //当前API能力的版本，您可以在SDK地址中查看最新的版本。
                              ->action('RecognizeIdentityCard')    //API接口名称，此处为MakeSuperResolutionImage。
                              ->method('POST')
                              ->host('ocr.cn-shanghai.aliyuncs.com')   //外网访问域名，Endpoint。
                              ->options([
                                    'query' => [
                                        'ImageURL' => "<oss链接，必须是阿里的华东区(上海)>",
                                        'Side' => "face"
                                        ],
                                    ])
                              ->request();
            $backResult = $result->toArray();
        
            return $backResult['Data'];
        } catch (ClientException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }
    }
}
