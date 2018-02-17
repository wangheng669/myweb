<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Admin extends Base
{

    private $obj;

    public function _initialize()//初始化操作
    {
        parent::_initialize();
        $this->obj = model('Admin');
    }

    //返回列表页
    public function index()
    {
        $this->doLogin();
        $result = $this->obj->getAdminAll();
        return $this->fetch('admin_list', [
            'adminlist' => $result,
        ]);
    }

    //返回添加页面
    public function add_admin()
    {
        return $this->fetch('admin_add');
    }

    //添加操作
    public function save_admin()
    {
        return $this->obj->operate(false);
    }

    //编辑操作
    public function edit_admin()
    {
        return $this->obj->operate(true);
    }

    //返回修改页面
    public function admin_edit()
    {
        $result = $this->edit('admin');
        return $this->fetch('admin_edit', [
            'admin_edit' => $result,
        ]);
    }

    //删除操作
    public function del()
    {
        return $this->delete('Admin');
    }

    //状态操作
    public function status(Request $request)
    {
        $status    = 0;
        $post_data = $request->post();
        if (!empty($post_data)) {
            $id = intval($post_data['id']);
            if ($id == 0) {
                $message = '错误';
                return $data = [
                    'status'  => $status,
                    'message' => $message,
                ];
            }
            $result = $this->obj->get($id);
            //判断该id的状态是否为禁用
            if ($result['status'] == 0) {
                $result->save(['status' => 1]);
                $status  = 5;
                $message = '启用成功';
            } else {
                $result->save(['status' => 0]);
                $status  = 6;
                $message = '禁用成功';
            }
        }
        $data = [
            'status'  => $status,
            'message' => $message,
        ];
        return $data;
    }
}
