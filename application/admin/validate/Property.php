<?php

namespace app\admin\validate;

use think\Validate;

class Property extends Validate
{
    //定义规则
    protected $rule    = [
        'id'         => 'number',
        'product_id' => 'require|number',
        'title' => 'require|checkChina',
    ];
    protected $message = [
        'id.number'           => '请勿修改',
        'product_id.require' =>'产品不能为空',
        'title.require' => '产品属性名称不能为空',
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
