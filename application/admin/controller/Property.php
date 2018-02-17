<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Property extends Base
{
    public function index()
    {
        $property_list=model('property')->all();
        $count=model('property')->count();
        return $this->fetch('property_list',[
            'property_list'=>$property_list,
            'count'=>$count,
        ]);
    }
    public function edit_property()
    {
        $property=$this->edit('property');
        $product=model('product')->all();
        return $this->fetch('property_edit',[
            'property'=>$property,
            'product'=>$product,
        ]);
    }
    public function add_property()
    {
        //获取栏目信息
        $product=model('product')->all();
        return $this->fetch('property_add',[
            'product'=>$product,
        ]);
    }
    public function save_property(){
        return $this->operate('Property',$where=false);
    }
    public function property_edit(){
        return $this->operate('Property',$where=true);
    }
    public function del_property(){
        return $this->delete('Property');
    }
}
