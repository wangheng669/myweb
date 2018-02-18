<?php

namespace app\index\controller;

use app\index\common\Base;

class About extends Base
{
    //公司简介
    public function index($id = 'index')
    {
        $this->webStatus();
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //获取公司简介模板
        return $this->fetch($id, [
            'system'     => $system,
            'oneColumn' => $oneColumn,
        ]);
    }

    //发展历程
    public function develop()
    {
        //获取网站信息
        $this->webStatus();
        $system     = model('System')->get(1);
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //获取发展历程
        $aboutList = model('About')->order('year', 'desc')->group('year')->select();
        $about      = model('About')->order('year', 'desc')->order('month', 'desc')->select();
        return $this->fetch('develop', [
            'aboutList' => $aboutList,
            'about'      => $about,
            'system'     => $system,
            'oneColumn' => $oneColumn,
        ]);
    }

    //荣誉证书
    public function proud()
    {
        //检测网站状态
        $this->webStatus();
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //获取证书
        $proudList = model('Proud')->all();
        return $this->fetch('proud', [
            'system'     => $system,
            'oneColumn' => $oneColumn,
            'proudList' => $proudList,
        ]);
    }
}
