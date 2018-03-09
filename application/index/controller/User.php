<?php
/**
 * @desc
 * @author kcjia
 * @time 2018/3/7
 */
namespace app\index\controller;

use app\common\controller\BaseController;
use think\Session;

class User extends BaseController
{
    public function login()
    {
        $pwd = I('post.pwd', '');
        $loginCount = 0;
        if(Session::has('loginCount')) {
            $loginCount = Session::get('loginCount');
        }
        if ($loginCount > 3) {
            $this->returnR('重试次数过多,请稍后重试', E_LOGIN);
        }
        if ($pwd == 'AppleDate93726') {
            Session::delete('loginCount');
            Session::set('login', 1);
            return $this->returnR('登录成功', E_OK);
        }
        $loginCount += 1;
        Session::set('loginCount', $loginCount);
        $this->returnR('密码错误,请重试');
    }
}    