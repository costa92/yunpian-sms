<?php
/**
 * Created by PhpStorm.
 * User: Costa92
 * Date: 16/12/22
 * Time: 下午3:25
 */

namespace Costa92\YunpianSMS\Services;


use HavenShen\YunpianSMS\Http;
use Illuminate\Support\Facades\Config;

class YunpianSMSService
{
    /**
     * Http对象
     *
     * @var Http
     */
    protected $http;

    protected $apikey;

    protected $sendUrl;

    protected $sendText;


    public function __construct()
    {
        $this->http = new Http();
        $this->apikey = Config::get('yunpian.smsApiKey');
        $this->sendUrl = Config::get('yunpian.smsSendUrl');
        $this->sendText = Config::get('yunpian.smsSendText');
    }

    public function sendSMS($mobile,$verifyCode=""){
         $verifyCode =$verifyCode?$verifyCode:(mt_rand(100000,999999));
        \Cache::put($mobile.'VerifyCode',$verifyCode,30);
        $postArr = [
            'apikey' => $this->apikey,
            'text' =>urlencode($this->setText($verifyCode)),
            'mobile' => $mobile
        ];
        $options = array(
            'headers' => array(
                'Accept:application/json;charset=utf-8;',
                'Content-Type:application/x-www-form-urlencoded;charset=utf-8;',
            ),
            'strings' => true
        );
        $response = $this->http->post($this->sendUrl,$postArr,$options);
        return $response['data'];
    }

    public function setText($verifyCode){
        if($verifyCode){
           if(strpos($this->sendText,'@')){
               return str_replace('@',$verifyCode,$this->sendText);
           }
            return $this->sendText.$verifyCode;
       }
       return null;
    }
}