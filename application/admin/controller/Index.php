<?php
namespace app\admin\controller;

use app\admin\common\Base;
use think\Session;

class Index extends Base
{
    public function index()
    {
        //判断是否登录
        $this->doLogin();
        return $this->fetch('index',[
            'username'=>USER_ID,
        ]);
    }
    public function welcome()
    {
        return $this->fetch('welcome');
    }
}
