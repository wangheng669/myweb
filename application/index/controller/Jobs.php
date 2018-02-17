<?php

namespace app\index\controller;

use app\index\common\Base;

class Jobs extends Base
{
    public function index($type)
    {
        $this->webStatus();
        //获取网站信息
        $system=model('System')->get(1);
        //获取顶级栏目
        $one_column=model('Column')->where(['parent_id'=>0])->order(['sort'=>'desc'])->select();
        //获取招聘信息
        $jobs_list=model('Jobs')->where(['jobs_type'=>$type])->select();
        return $this->fetch('index',[
            'system'=>$system,
            'one_column'=>$one_column,
            'jobs_list'=>$jobs_list,
            'type'=>$type,
        ]);
    }
    public function idea()
    {
        $this->webStatus();
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $one_column = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        return $this->fetch('idea',[
            'system'=>$system,
            'one_column'=>$one_column,
        ]);
    }
}
