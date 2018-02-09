<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;

class System extends Base
{
    private $obj;
    public function _initialize()//初始化操作
    {
        parent::_initialize();
        //判断是否登录
        $this->doLogin();
        $this->obj=model('System');
    }

    public function index()
    {
        //系统设置
        //读取system数据表
        $result=$this->obj->get(1);
        return $this->fetch('system_set',[
            'systemlist'=>$result,
        ]);
    }
    public function log()
    {
        $result=model('Log')->getLogAll();
        //系统日志
        return $this->fetch('system_log',[
            'log'=>$result,
        ]);
    }
    public function link()
    {
        $result=model('Links')->getLinksAll();
        //友情链接
        return $this->fetch('system_link',[
            'links'=>$result,
        ]);
    }


    //添加友情链接
    public function addLinks(){
        return $this->operate('Links',$where=false);
    }
    //返回修改页面
    public function links_edit()
    {
        $result=$this->edit('links');
        return $this->fetch('links_edit',[
            'links_edit'=>$result,
        ]);
    }

    //修改操作
    public function saveLinks(){
        return $this->operate('Links',$where=true);
    }

    //删除友情链接
    public function del_link(){
        return $this->delete('Links');
    }
    //删除操作
    public function del_log(){
        return $this->delete('Log');
    }

    //更新网站
    public function saveWeb(){
        return $this->operate('System',true);
    }
}
