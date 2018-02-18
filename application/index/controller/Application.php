<?php

namespace app\index\controller;

use app\index\common\Base;

class Application extends Base
{
    public function index()
    {
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //获取应用
        $applicationList = model('application')->all();
        return $this->fetch('index', [
            'system'           => $system,
            'oneColumn'       => $oneColumn,
            'applicationList' => $applicationList,
        ]);
    }

    public function list($id)
    {
        $this->webStatus();
        $application = model('Application')->get(['application_id' => $id]);
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //获取当前应用下的产品
        $producList = model('Product')->where(['application_id' => $id])->select();
        return $this->fetch('list', [
            'application'  => $application,
            'system'       => $system,
            'oneColumn'   => $oneColumn,
            'productList' => $producList,
        ]);
    }
}
