<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Category extends Base
{
    public function index()
    {
        $categoryList = model('category')->all();
        $count         = model('category')->count();
        return $this->fetch('category_list', [
            'categoryList' => $categoryList,
            'count'         => $count,
        ]);
    }

    public function editCategory()
    {
        $category = $this->edit('category');
        $columns  = model('column')->where(['parent_id' => 18])->select();
        return $this->fetch('category_edit', [
            'category' => $category,
            'columns'  => $columns,
        ]);
    }

    public function addCategory()
    {
        //获取栏目信息
        $columns = model('column')->where(['parent_id' => 18])->select();
        return $this->fetch('category_add', [
            'columns' => $columns,
        ]);
    }

    public function saveCategory()
    {
        return $this->operate('Category', $where = false);
    }

    public function categoryEdit()
    {
        return $this->operate('Category', $where = true);
    }

    public function delCategory()
    {
        return $this->delete('Category');
    }
}
