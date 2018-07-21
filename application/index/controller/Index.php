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
    public function index()
    {
        return $this->fetch();
    }

    public function article()
    {
        return $this->fetch();
    }
}