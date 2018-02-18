<?php

namespace app\index\controller;

use app\index\common\Base;

class Index extends Base
{
    public function index()
    {
        $this->webStatus();
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //获取图片
        $banner = model('Banner')->where(['type' => 0])->select();
        //获取网站信息
        $system = model('System')->get(1);
        //获取新闻信息
        $news = model('News')->where('column_id', 'in', '10,11,12')->where('reveal', 1)->select();
        return $this->fetch('index', [
            'oneColumn' => $oneColumn,
            'banner'     => $banner,
            'system'     => $system,
            'news'       => $news,
        ]);
    }
}
