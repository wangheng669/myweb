<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use think\Session;
class Login extends Base
{
    //渲染登录界面
    public function index()
    {
        $this->alreadyLogin();
        return $this->fetch();
    }
    //验证登录
    public function check(Request $request)
    {
        //设置初始状态值
        $status=0;
        //获取用户登录信息
        $data=$request->param();
        $userName=$data['username'];
        $map=['username'=>$userName];
        $password=$data['password'];
        $admin=model('Admin')->get($map);
        if(is_null($admin)){
            $message='用户不存在';
        }else if($admin->password!=md5($password.$admin->email)){
            $message='密码不正确';
        }else if($admin->status!=1){
            $message='该用户已被禁用';
        }else{
            $status=1;
            $message='登录成功';
            //插入登录次数
            $admin->setInc('login_count');
            $admin->save(['last_time'=>time()]);
            //记录SESSION,便于其他控制器判断
            Session::set('user_id',$userName);
            Session::set('user_info',$data);
        }
        $log_data=[
            'content'=>$message,
            'username'=>$userName,
            'ip'=>$request->ip(),
        ];
        model('Log')->save($log_data);
        $result_data=['status'=>$status,'message'=>$message];
        return json($result_data);
    }
    //退出登录
    public function loginout()
    {
        Session::delete('user_id');
        Session::delete('user_info');
        $this->success('退出成功','login/index');
    }
}
