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
        $account = I('post.account', 'jkc');
        $pwd = I('post.pwd', '');
        if (empty($pwd)) {
            return $this->returnR('密码不能为空', E_LOGIN);
        }
        $loginCount = 0;
        if(Session::has('loginCount')) {
            $loginCount = Session::get('loginCount');
        }
        if ($loginCount > 10000) {
            return $this->returnR('重试次数过多,请稍后重试', E_LOGIN);
        }
        if ($pwd == 'jkc726') {
            Session::delete('loginCount');
            Session::set('login', 1);
            return $this->returnR('登录成功', E_OK);
        }
        $loginCount += 1;
        Session::set('loginCount', $loginCount);
        return $this->returnR('密码错误,请重试', E_OK);
    }
}