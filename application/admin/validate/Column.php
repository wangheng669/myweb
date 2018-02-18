<?php

namespace app\admin\validate;

use think\Validate;

class Column extends Validate
{
    //定义规则
    protected $rule    = [
        //id
        'id'          => 'number',
        //父级id
        'parent_id'   => 'require|number',
        //栏目名称
        'column_name' => 'require|checkChina',
        'column_link' => 'require|url',
        'sort'        => 'number|between:0,100',
    ];
    protected $message = [
        'column_link.require' => '链接名称不能为空',
        'parent_id.require'   => '分类不能为空',
        'column_link.url'     => '请填写正确URL地址',
        'sort.number'         => '请填写数字',
        'sort.between'        => '不能写负数',
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
