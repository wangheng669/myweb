<?php

namespace app\index\controller;

use app\index\common\Base;

class News extends Base
{
    public function index($id=10)
    {
        $this->webStatus();
        //获取大图新闻
        $news=model('News')->where('column_id','EQ',$id)->where('reveal',1)->find();
        //获取日期新闻
        $news_list=model('News')->where('column_id','EQ',$id)->where('reveal','NEQ',1)->select();
        //获取网站信息
        $system=model('System')->get(1);
        //获取顶级栏目
        $one_column=model('Column')->where(['parent_id'=>0])->order(['sort'=>'desc'])->select();
        return $this->fetch('index',[
            'news'=>$news,
            'system'=>$system,
            'one_column'=>$one_column,
            'news_list'=>$news_list,
        ]);
    }
    public function list($id){
        $this->webStatus();
        $news=model('News')->get($id);
        //获取网站信息
        $system=model('System')->get(1);
        //获取顶级栏目
        $one_column=model('Column')->where(['parent_id'=>0])->order(['sort'=>'desc'])->select();
        return $this->fetch('list',[
            'news'=>$news,
            'system'=>$system,
            'one_column'=>$one_column,
        ]);
    }
}
