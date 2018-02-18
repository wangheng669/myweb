<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Property extends Base
{
    public function index()
    {
        $propertyList = model('property')->all();
        $count         = model('property')->count();
        return $this->fetch('property_list', [
            'propertyList' => $propertyList,
            'count'         => $count,
        ]);
    }

    public function editProperty()
    {
        $property = $this->edit('property');
        $product  = model('product')->all();
        return $this->fetch('property_edit', [
            'property' => $property,
            'product'  => $product,
        ]);
    }

    public function addProperty()
    {
        //获取栏目信息
        $product = model('product')->all();
        return $this->fetch('property_add', [
            'product' => $product,
        ]);
    }

    public function saveProperty()
    {
        return $this->operate('Property', $where = false);
    }

    public function propertyEdit()
    {
        return $this->operate('Property', $where = true);
    }

    public function delProperty()
    {
        return $this->delete('Property');
    }
}
