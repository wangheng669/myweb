<?php

namespace app\index\controller;

use app\index\common\Base;

class Jobs extends Base
{
    public function index($type)
    {
        $this->webStatus();
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //获取招聘信息
        $jobsList = model('Jobs')->where(['jobs_type' => $type])->select();
        return $this->fetch('index', [
            'system'     => $system,
            'oneColumn' => $oneColumn,
            'jobsList'  => $jobsList,
            'type'       => $type,
        ]);
    }

    public function idea()
    {
        $this->webStatus();
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        return $this->fetch('idea', [
            'system'     => $system,
            'oneColumn' => $oneColumn,
        ]);
    }
}
