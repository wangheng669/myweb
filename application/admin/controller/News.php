<?php

namespace app\admin\controller;


use app\admin\common\Base;
use think\Request;

class News extends Base
{
    public function index()
    {
        $news_list=model('news')->all();
        $count=model('news')->count();
        return $this->fetch('news_list',[
            'news_list'=>$news_list,
            'count'=>$count,
        ]);
    }
    public function edit_news()
    {
        $news=$this->edit('news');
        //获取二级栏目
        $column=model('column')->where('parent_id','NEQ',0)->select();
        return $this->fetch('news_edit',[
            'news'=>$news,
            'column'=>$column,
            ]);
    }
    public function add_news()
    {
        //获取二级栏目
        $column=model('column')->where('parent_id','NEQ',0)->select();
        return $this->fetch('news_add',[
            'column'=>$column,
        ]);
    }
    public function save_news(){
        return $this->operate('News',$where=false);
    }
    public function news_edit(){
        return $this->operate('News',$where=true);
    }
    public function del_news(){
        return $this->delete('News');
    }
}
