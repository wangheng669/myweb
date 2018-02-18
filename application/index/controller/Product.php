<?php

namespace app\index\controller;

use app\index\common\Base;

class Product extends Base
{
    public function index($id)
    {
        $this->webStatus();
        $product = model('product')->where('id', 'EQ', $id)->find();
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //获取产品属性
        $property = model('Property')->where(['product_id' => $id])->select();
        return $this->fetch('index', [
            'product'    => $product,
            'system'     => $system,
            'oneColumn' => $oneColumn,
            'property'   => $property,
        ]);
    }
}
