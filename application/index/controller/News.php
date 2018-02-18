<?php

namespace app\index\controller;

use app\index\common\Base;

class News extends Base
{
    public function index($id = 10)
    {
        $this->webStatus();
        //获取大图新闻
        $news = model('News')->where('column_id', 'EQ', $id)->where('reveal', 1)->find();
        //获取日期新闻
        $newsList = model('News')->where('column_id', 'EQ', $id)->where('reveal', 'NEQ', 1)->select();
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        return $this->fetch('index', [
            'news'       => $news,
            'system'     => $system,
            'oneColumn' => $oneColumn,
            'newsList'  => $newsList,
        ]);
    }

    public function list($id)
    {
        $this->webStatus();
        $news = model('News')->get($id);
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        return $this->fetch('list', [
            'news'       => $news,
            'system'     => $system,
            'oneColumn' => $oneColumn,
        ]);
    }

    //搜索功能
    public function search($keywords)
    {
        $this->webStatus();
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //查到的内容
        $newsList = model('News')->where('title', 'like', '%' . $keywords . '%')->select();
        return $this->fetch('search', [
            'system'     => $system,
            'oneColumn' => $oneColumn,
            'newsList'  => $newsList,
        ]);
    }
}
