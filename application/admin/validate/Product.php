<?php

namespace app\admin\validate;

use think\Validate;

class Product extends Validate
{
    //定义规则
    protected $rule    = [
        'id'         => 'number',
        'name' => 'require|checkChina',
        'application_id'=>'require|number',
        'category_id'=>'require|number',
        'content'    => 'require',
        'image'           => 'imageSrc',
    ];
    protected $message = [
        'id.number'           => '请勿修改',
        'content.require'     => '内容不能为空',
        'name.require' => '产品名称不能为空',
        'application_id'=>'应用不能为空',
        'category_id'=>'应用不能为空',
    ];
    protected function imageSrc($value)
    {
        $res = preg_match_all('/^[a-zA-Z0-9\\\\\\.]+$/', $value);
        if (!$res) {
            return "不是有效的路径";
        } else {
            return true;
        }
    }
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
