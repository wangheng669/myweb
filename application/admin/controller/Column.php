<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use app\common\model\Column as ModelColumn;

class Column extends Base
{
    private $obj;

    public function _initialize()//初始化操作
    {
        parent::_initialize();
        $this->doLogin();
        $this->obj = model('Column');

    }

    public function index()
    {
        $columns     = ModelColumn::getColumn();
        $columnList = ModelColumn::paginate(10);
        return $this->fetch('column_list', [
            'columns'     => $columns,
            'columnList' => $columnList
        ]);
    }

    //添加操作
    public function addColumn()
    {
        return $this->operate('Column', false);
    }

    //返回修改页面
    public function columnEdit()
    {
        //获取一级分类
        $columns = ModelColumn::getColumn();
        $columnEdit  = $this->edit('column');
        return $this->fetch('column_edit', [
            'columnEdit' => $columnEdit,
            'columns'     => $columns,
        ]);
    }

    //修改操作
    public function saveColumn()
    {
        return $this->operate('Column', true);
    }

    //删除操作
    public function del(Request $request)
    {
        $post_data = $request->post();
        //查询该ID是否为顶级栏目
        $status  = 0;
        $message = '删除失败';
        if (!empty($post_data['id']) && intval($post_data['id']) != 0) {
            $id = $post_data['id'];
            ModelColumn::destroy(function ($query) use ($id) {
                $query->where(['parent_id' => $id])->field('id');
            });
            ModelColumn::destroy($id);
            $status  = 1;
            $message = '删除成功';
            $data    = [
                'status'  => $status,
                'message' => $message,
            ];
            return $data;
        } else {
            $this->error('数据错误');
        }
    }
}
