<?php

namespace app\index\controller;

use app\index\common\Base;


class Category extends Base
{
    public function index($id)
    {
        $this->webStatus();
        $category = model('Category')->where('category_id', 'EQ', $id)->find();
        //获取网站信息
        $system = model('System')->get(1);
        //获取顶级栏目
        $oneColumn = model('Column')->where(['parent_id' => 0])->order(['sort' => 'desc'])->select();
        //获取产品
        $product = model('Product')->where(['category_id' => $id])->select();
        return $this->fetch('index', [
            'category'   => $category,
            'system'     => $system,
            'oneColumn' => $oneColumn,
            'product'    => $product,
        ]);
    }
}
