# Day2——身份证识别系统搭建

1. 最终效果：上传身份证人像面和身份证国徽面之后可以查看到身份证上的信息
2. 主要步骤：

- 申请开放能力
- 生成accessKeyId和accessKeySecret
- 在[视觉开放平台](https://vision.aliyun.com)中下载sdk
- 敲代码

3. 配置项目时需要配置`accessKeyId`、`accessKeySecret`、`文件上传路径`

4. 版本查找：[maven](https://mvnrepository.com/artifact/com.aliyun/aliyun-java-sdk-ocr)(PHP的是`2019-12-30`，这是java的)

5. 注意：上传文件时需要判断文件类型、是否上传成功，共需上传两个图片，正面(face)、反面(back)，图片

6. 主要代码

   ```php
   <?php
   require __DIR__ . '/vendor/autoload.php';
   use AlibabaCloud\Client\AlibabaCloud;
   use AlibabaCloud\Client\Exception\ClientException;
   use AlibabaCloud\Client\Exception\ServerException;
   
   // Download：https://github.com/aliyun/openapi-sdk-php
   // Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md
   
   AlibabaCloud::accessKeyClient('<你的key>', '<你的appKeySecret>')
                 ->regionId('cn-shanghai')
                 ->asDefaultClient();
   
   try {
       $result = AlibabaCloud::rpc()
                             ->product('ocr')
                             ->scheme('http')
                             ->version('2019-12-30')
                             ->action('RecognizeIdentityCard')
                             ->method('POST')
                             ->host('ocr.cn-shanghai.aliyuncs.com')
                             ->options([
                                   'query' => [
                                       'ImageURL' => "<oss地址，这里除java外其他必须是oss地址,oss必须是华东(上海)区>",
                                       'Side' => "face"
                                       ],
                                   ])
                             ->request();
       print_r($result->toArray());
   } catch (ClientException $e) {
       echo $e->getErrorMessage() . PHP_EOL;
   } catch (ServerException $e) {
       echo $e->getErrorMessage() . PHP_EOL;
   }
   ```

   

7. 代码地址：[github](<https://github.com/LukeJean/AliAI-TrainingCamp/tree/master/Day2/code>)

8. 效果(没加oss上传文件的，等过几天不忙了再加):

   ![效果](https://blog.pipicui.wang/usr/uploads/2020/05/2034497967.png)
