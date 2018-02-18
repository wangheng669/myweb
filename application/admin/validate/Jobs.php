<?php

namespace app\admin\validate;

use think\Validate;

class Jobs extends Validate
{
    //定义规则
    protected $rule    = [
        //id
        'id'          => 'number',
        //招聘类型
        'jobs_type'   => 'require|number|in:0,1',
        //工作职位
        'office'      => 'require',
        //所属部门
        'branch'      => 'require|checkChina',
        //工作地点
        'address'     => 'require',
        //岗位描述
        'description' => 'require',
        //任职资格
        'content'     => 'require',
        //联系人名称
        'name'        => 'require',
        //邮箱
        'email'       => 'require',
    ];
    protected $message = [
        'jobs_type.require'   => '招聘类型不能为空',
        'office.require'      => '职位不能为空',
        'branch.require'      => '所属部门不能为空',
        'address.require'     => '工作地点不能为空',
        'description.require' => '岗位描述不能为空',
        'content.require'     => '任职资格不能为空',
        'name.require'        => '联系人名称不能为空',
        'email.require'       => '联系人邮箱不能为空',
    ];

    protected function checkChina($value)
    {
        $res = preg_match_all('/^[a-zA-Z0-9\x{4e00}-\x{9fa5}]+$|^[a-zA-Z0-9\x{4e00}-\x{9fa5}][a-zA-Z0-9_\s\ \x{4e00}-\x{9fa5}\.]*[a-zA-Z0-9\x{4e00}-\x{9fa5}]+$/u', $value);
        if (!$res) {
            return "只能输入中文";
        } else {
            return true;
        }
    }
}
