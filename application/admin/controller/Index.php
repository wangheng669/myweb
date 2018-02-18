<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Index extends Base
{
    public function index()
    {
        //判断是否登录
        $this->doLogin();
        return $this->fetch('index', [
            'username' => USER_ID,
        ]);
    }

    public function welcome()
    {
        $username    = USER_ID;
        $hostip      = $_SERVER['HTTP_HOST'];
        $hostname    = $_SERVER['SERVER_NAME'];
        $psot        = $_SERVER['SERVER_PORT'];
        $apache_name = $_SERVER['SERVER_SIGNATURE'];
        $system      = PHP_OS;
        $time        = date('Y-m-d H:i:s', time());
        $admin       = model('admin')->where('username', 'EQ', $username)->find();
        return $this->fetch('welcome', [
            'username'    => $username,
            'admin'       => $admin,
            'hostname'    => $hostname,
            'hostip'      => $hostip,
            'post'        => $psot,
            'apache_name' => $apache_name,
            'system'      => $system,
            'time'        => $time,
        ]);
    }
}
