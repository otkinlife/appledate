<?php

namespace app\common\behavior;

class InitConfigBehavior
{
    public function run(&$content)
    {
        return;
        //读取数据库中的配置
        $system_config = cache('DB_CONFIG_DATA');
        if(!$system_config){
            //获取所有系统配置
            $system_config = \think\Loader::model('common/SystemConfig')->getDataList();
            cache('DB_CONFIG_DATA', null);
            cache('DB_CONFIG_DATA', $system_config, 36000); //缓存配置
        }
        config($system_config); //添加配置
    }
}