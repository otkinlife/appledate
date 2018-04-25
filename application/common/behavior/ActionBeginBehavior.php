<?php
/**
 * @desc  PhpStorm.
 * @author: jiakaichao
 * Time: 2017/6/28 14:16
 */
namespace app\common\behavior;

use app\common\auth\AdminAuth;
use app\common\auth\ApiAuth;
use app\common\auth\AuthAdapter;
use think\Config;
use think\Hook;
use think\Log;
use think\Request;
use think\Response;
use think\Cookie;
use think\Session;

class ActionBeginBehavior
{
    /**
     * 方法执行之前进行校验(检查是否登录和是否有权限)
     * @return bool
     */
    public function run()
    {
        $isLogin = Session::get('login');
        if (Request::instance()->module() === 'index') {
            return true;
        }
        if (empty($isLogin)) {
            echo json_encode(['code' => E_LOGIN, 'message' => '用户未登录']);
            die;
        }
    }
}