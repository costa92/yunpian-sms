# yunpian-sms
> 本版本可以用于使用[云片网络短信服务商](http://www.yunpian.com/)、基于laravel5.1.*以上版本的系统集成短信发送功能。

## 安装

1. 安装包文件

  ```shell
  composer require costa92/yunpian-sms
  ```

## 配置

### Laravel 应用

1. 注册 `ServiceProvider`:

  ```php
  Costa92\YunpianSMS\YunpianSMSServiceProvider::class,
  ```

2. 创建配置文件：

  ```shell
  php artisan vendor:publish
  ```

3. 请修改应用根目录下的 `config/yunpian.php` 中对应的项即可；

4. （可选）添加外观到 `config/app.php` 中的 `aliases` 部分:

  ```php
  'YunpianSMS' => Costa92\YunpianSMS\Facades\YunpianSMS::class,
  ```
  
5. 在 ENV 中配置以下选项：

  ```php
  SMS_API_KEY=xxx      // 云片的秘钥
  SMS_SEND_URL=xxx    //发短信的api
  SMS_SEND_TEXT=xxx  //发送的内容，验证码用@代替  ge：【xxx】您的验证码是@。如非本人操作，请忽略本短信
  ```
  
6.使用

  ```php
  /*
  * 参数 phone  可以是个string字符串或array字符串群发
  * 参数 code 可用为空，也可用不为空，
  * 
  */
  
  \YunpianSMS::sendSMS($phone,$code);
  ```
  
## License

MIT

