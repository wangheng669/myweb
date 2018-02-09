<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    //获取管理员权限类别字段转换
    public function getroleAttr($value)
    {
        $status = [1=>'超级管理员',0=>'编辑人员'];
        return $status[$value];
    }
    //对应时间转换
    public function getLastTimeAttr($value)
    {
        return date('Y/m/d',$value);
    }

    //获取管理员全部数据
    public function getAdminAll(){
        $result=$this->paginate(5);
        return $result;
    }

    //执行更新和添加操作
    public function operate($where=null){
        //定义默认返回值
        $status=0;
        $message="操作失败";
        $data=request()->post();
        if(!empty($data)){
            //进行数据校验
            $validate = validate('Admin');
            if(!$validate->check($data)){
                $message=$validate->getError();
                return $result_data=['status'=>$status,'message'=>$message];
            }
            //判断用户名或邮箱是否重复
            if($this->get(['username'=>$data['username']])||$this->get(['email'=>$data['email']])){
                    $message='邮箱或用户名重复';
                    return $result_data=['status'=>$status,'message'=>$message];
            }
            //判断密码是否正确
            if($data['password']!=$data['repassword']){
                    $message='密码不相同';
                    return $result_data=['status'=>$status,'message'=>$message];
            }
            $data['password']=md5($data['repassword'].$data['email']);
            if($where){
                if(!$this->allowField(true)->save($data,['id'=>$data['id']])){
                $message='异常错误,请联系管理员!!';
                };
                $status=1;
                $message='操作成功';
            }else{
                if(!$this->allowField(true)->save($data)){
                $message='异常错误,请联系管理员!!';
                };
                $status=1;
                $message='操作成功';
            }
            
        }
        return $result_data=['status'=>$status,'message'=>$message];
    }
}
