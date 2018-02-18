<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Product extends Base
{
    public function index()
    {
        $productList = model('product')->all();
        $count        = model('product')->count();
        return $this->fetch('product_list', [
            'productList' => $productList,
            'count'        => $count,
        ]);
    }

    public function editProduct()
    {
        $product = $this->edit('product');
        $columns = model('column')->where(['parent_id' => 18])->select();
        //获取应用信息
        $application = model('column')->where(['parent_id' => 13])->select();
        return $this->fetch('product_edit', [
            'product'     => $product,
            'columns'     => $columns,
            'application' => $application,
        ]);
    }

    public function addProduct()
    {
        //获取栏目信息
        $columns = model('column')->where(['parent_id' => 18])->select();
        //获取应用信息
        $application = model('column')->where(['parent_id' => 13])->select();
        return $this->fetch('product_add', [
            'columns'     => $columns,
            'application' => $application,
        ]);
    }

    public function saveProduct()
    {
        return $this->operate('Product', $where = false);
    }

    public function productEdit()
    {
        return $this->operate('Product', $where = true);
    }

    public function delProduct()
    {
        return $this->delete('Product');
    }
}
