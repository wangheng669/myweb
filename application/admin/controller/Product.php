<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Product extends Base
{
    public function index()
    {
        $product_list=model('product')->all();
        $count=model('product')->count();
        return $this->fetch('product_list',[
            'product_list'=>$product_list,
            'count'=>$count,
        ]);
    }
    public function edit_product()
    {
        $product=$this->edit('product');
        $columns=model('column')->where(['parent_id'=>18])->select();
        //获取应用信息
        $application = model('column')->where(['parent_id' => 13])->select();
        return $this->fetch('product_edit',[
            'product'=>$product,
            'columns'=>$columns,
            'application'=>$application,
        ]);
    }
    public function add_product()
    {
        //获取栏目信息
        $columns=model('column')->where(['parent_id'=>18])->select();
        //获取应用信息
        $application = model('column')->where(['parent_id' => 13])->select();
        return $this->fetch('product_add',[
            'columns'=>$columns,
            'application'=>$application,
        ]);
    }
    public function save_product(){
        return $this->operate('Product',$where=false);
    }
    public function product_edit(){
        return $this->operate('Product',$where=true);
    }
    public function del_product(){
        return $this->delete('Product');
    }
}
