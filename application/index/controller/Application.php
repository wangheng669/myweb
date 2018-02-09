<?php

namespace app\index\controller;

use app\index\common\Base;

class Application extends Base
{
    public function index()
    {
         //获取网站信息
        $system=model('System')->get(1);
        //获取顶级栏目
        $one_column=model('Column')->where(['parent_id'=>0])->order(['sort'=>'desc'])->select();
        //获取应用
        $application_list=model('application')->all();
        return $this->fetch('index',[
            'system'=>$system,
            'one_column'=>$one_column,
            'application_list'=>$application_list,
        ]);
    }
    public function list($id){
        $this->webStatus();
        $application=model('Application')->get(['application_id'=>$id]);
        //获取网站信息
        $system=model('System')->get(1);
        //获取顶级栏目
        $one_column=model('Column')->where(['parent_id'=>0])->order(['sort'=>'desc'])->select();
        return $this->fetch('list',[
            'application'=>$application,
            'system'=>$system,
            'one_column'=>$one_column,
        ]);
    }
}
