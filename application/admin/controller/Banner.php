<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Banner extends Base
{
    private $obj;

    public function _initialize()//初始化操作
    {
        parent::_initialize();
        $this->obj = model('Banner');
    }

    public function index()
    {
        //返回获取的数据
        $bannerList   = $this->obj->All();
        $listNum = count($bannerList);
        return $this->fetch('banner_list', [
            'bannerList' => $bannerList,
            'listNum'    => $listNum
        ]);
    }

    public function bannerAdd()
    {
        return $this->fetch('banner_add');
    }

    //添加操作
    public function saveBanner()
    {
        return $this->operate('Banner', $where = false);
    }

    //编辑操作
    public function editBanner()
    {
        return $this->operate('Banner', $where = true);
    }

    //删除操作
    public function delBanner()
    {
        return $this->delete('Banner');
    }

    public function upload()
    {
        $message = '上传成功';
        $src     = '';
        $file    = request()->file('file');
        if (empty($file)) {
            $message = '图片上传失败';
        } else {
            //进行上传操作
            $map  = [
                'ext'  => 'jpg,png,gif',
                'size' => 3000000,
            ];
            $info = $file->validate($map)->move(ROOT_PATH . 'public/uploads');
            if (is_null($info)) {
                $message = '图片信息出错';
            }
            //获取图片名称
            $src = $info->getSaveName();
        }
        $result_data = [
            'message' => $message,
            'src'     => $src,
        ];
        return json($result_data);
    }

    //返回修改页面
    public function bannerEdit()
    {
        $bannerEdit = $this->edit('banner');
        return $this->fetch('banner_edit', [
            'bannerEdit' => $bannerEdit,
        ]);
    }
}
