<?php

namespace app\index\controller;

use app\index\common\Base;


class Category extends Base
{
    public function index($id)
    {
        $this->webStatus();
        $category=model('Category')->where('category_id','EQ',$id)->find();
        //获取网站信息
        $system=model('System')->get(1);
        //获取顶级栏目
        $one_column=model('Column')->where(['parent_id'=>0])->order(['sort'=>'desc'])->select();
        return $this->fetch('index',[
            'category'=>$category,
            'system'=>$system,
            'one_column'=>$one_column,
        ]);
    }
}