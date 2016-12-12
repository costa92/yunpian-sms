<?php
/**
 * Created by PhpStorm.
 * User: Costa92
 * Date: 16/12/22
 * Time: 下午3:18
 */

namespace Costa92\YunpianSMS\Facades;

use Illuminate\Support\Facades\Facade;

class YunpianSMS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'YunpianSMSService';
    }
}