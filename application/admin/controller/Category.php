<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Category extends Base
{
    public function index()
    {
        $category_list=model('category')->all();
        $count=model('category')->count();
        return $this->fetch('category_list',[
            'category_list'=>$category_list,
            'count'=>$count,
        ]);
    }
    public function edit_category()
    {
        $category=$this->edit('category');
        $columns=model('column')->where(['parent_id'=>18])->select();
        return $this->fetch('category_edit',[
            'category'=>$category,
            'columns'=>$columns,
            ]);
    }
    public function add_category()
    {
        //获取栏目信息
        $columns=model('column')->where(['parent_id'=>18])->select();
        return $this->fetch('category_add',[
            'columns'=>$columns,
        ]);
    }
    public function save_category(){
        return $this->operate('Category',$where=false);
    }
    public function category_edit(){
        return $this->operate('Category',$where=true);
    }
    public function del_category(){
        return $this->delete('Category');
    }
}
