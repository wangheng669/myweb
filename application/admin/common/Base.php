<?php

namespace app\admin\common;

use think\Controller;
use think\Session;
use think\Request;

class Base extends Controller
{
    //初始化SESSION变量
    public function _initialize()
    {
        parent::_initialize();
        define('USER_ID', Session::get('user_id'));
    }

    public function doLogin()
    {
        //判断用户是否登录
        if (is_null(USER_ID)) {
            $this->success('请先登录', 'login/index');
        }
    }

    public function alreadyLogin()
    {
        //判断用户是否登录
        if (!is_null(USER_ID)) {
            $this->success('请勿重复登录', 'index/index');
        }
    }

    public function operate($model, $where)
    {
        $status    = 0;
        $message   = '操作失败';
        $post_data = request()->post();
        $validate  = validate($model);
        if (!$validate->check($post_data)) {
            $message = $validate->getError();
        } else if ($where) {
            if (model($model)->allowField(true)->save($post_data, ['id' => $post_data['id']])) {
                $status  = 1;
                $message = '操作成功';
            }
        } else {
            if (model($model)->allowField(true)->save($post_data)) {
                $status  = 1;
                $message = '操作成功';
            }
        }
        $result_data = [
            'status'  => $status,
            'message' => $message,
        ];
        return $result_data;
    }

    //返回判断后的值
    public function edit($model)
    {
        if (request()->isGet()) {
            $get_data = request()->param();
            if (!empty($get_data['id']) && intval($get_data['id']) != 0) {
                $result = model($model)->get($get_data['id']);
                if (!$result) {
                    $this->error('数据错误!!');
                }
            } else {
                $this->error('数据错误!!');
            }
        } else {
            $this->error('数据错误!!');
        }
        return $result;
    }

    //删除操作
    public function delete($model)
    {
        $status    = 0;
        $message   = '删除失败';
        $post_data = request()->post();
        if (!empty($post_data)) {
            $id = intval($post_data['id']);
            if (model($model)->destroy(['id' => $id])) {
                $status  = 1;
                $message = '删除成功';
            };
        }
        $data = [
            'status'  => $status,
            'message' => $message,
        ];
        return $data;
    }
}
