<?php
/**
 * @desc PhpStorm.
 * @author: kcjia
 * @time
 */

namespace app\index\controller;

use app\common\controller\BaseController;
use think\Session;

class Index extends BaseController
{
    public  function index()
    {
        $isLogin = Session::get('login');
        if (empty($isLogin)) {
            $this->redirect('index/login');
        }
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }
}