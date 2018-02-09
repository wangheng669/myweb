<?php

namespace app\index\controller;

use app\index\common\Base;

class About extends Base
{
    public function index($id=2)
    {
        $this->webStatus();
        //获取内容
        $news=model('news')->get(['column_id'=>$id]);
        //获取网站信息
        $system=model('System')->get(1);
        //获取顶级栏目
        $one_column=model('Column')->where(['parent_id'=>0])->order(['sort'=>'desc'])->select();
        return $this->fetch('index',[
            'news'=>$news,
            'system'=>$system,
            'one_column'=>$one_column,
        ]);
    }
}
