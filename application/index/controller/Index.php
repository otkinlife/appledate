<?php
/**
 * @desc PhpStorm.
 * @author: kcjia
 * @time
 */

namespace app\index\controller;

use app\common\controller\BaseController;

class Index extends BaseController
{
    public  function index()
    {
        return $this->fetch();
    }
}