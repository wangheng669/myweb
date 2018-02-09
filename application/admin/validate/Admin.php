<?php

    namespace app\admin\validate;
    use think\Validate;
    class Admin extends Validate
    {
        //定义规则
        protected $rule = [
            'id'=>'number',
            //登录名
            'username'=>'require|max:50|min:5|alpha',
            //邮箱
            'email'=>'require|email|max:200',
            //角色
            'role'=>'require|number|in:1,0|max:1',
            //密码
            'password'=>'require|min:6|max:16',
            //确认密码
            'repassword'=>'require|min:6|max:16'
        ];
        protected $message = [
            'username.require' => '名称必须',
            'username.max'     => '名称最多不能超过50个字符',
            'username.min'   => '名称最少为5位',
            'username.alpha'   => '名称只能为字母',
            'role.require'        => '角色不能为空',
            'role.in'  => '角色只能是超级管理员或编辑人员',
            'role.max'  => '角色只能是超级管理员或编辑人员',
            'role.number'        => '角色格式错误',
            'email'        => '邮箱格式错误',
            'email.max'        => '邮箱过长',
            'password.require'=>'密码不能为空',
            'passwordpass.min'=>'密码最少为6位',
            'password.max'=>'密码最多为16位',
            'repassword.require'=>'两次密码不一致',
            'repassword.min'=>'两次密码不一致',
            'repassword.min'=>'密码最多为16位',
        ];

    }
