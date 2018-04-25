<?php
/**
 * @desc PhpStorm.
 * @author: kcjia
 * @time 2018/2/2
 */

namespace app\common\controller;


use think\Controller;

class BaseController extends Controller
{
    protected $service;

    /**
     * @desc 结果统一处理方法
     * @param $data mixed 返回数据
     * @return \think\response\Json
     * @author kcjia
     * @time 2018/2/27
     */
    protected function returnR($data, $code = '')
    {
        $result['code'] = $code;
        if ($code === E_OK) {
            $result['data'] = $data;
        } else {
            $result['message'] = $data;
        }
        return json($result);
    }

}