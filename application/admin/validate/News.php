<?php

namespace app\admin\validate;

use think\Validate;

class News extends Validate
{
    //定义规则
    protected $rule    = [
        //id
        'id'        => 'number',
        //标题
        'title'     => 'require',
        //内容
        'content'   => 'require',
        //栏目
        'column_id' => 'require|number',
        //展示
        'reveal'    => 'require|number',
    ];
    protected $message = [
        'link_name.require' => '链接名称不能为空',
        'url.require'       => '地址不能为空',
        'sort.number'       => '请填写数字',
        'column_id.require' => '栏目不能为空',
        'column_id.number'  => '栏目不能是数字',
    ];

    protected function checkChina($value)
    {
        $res = preg_match_all('/^[a-zA-Z0-9\x{4e00}-\x{9fa5},、。，]+$|^[a-zA-Z0-9\x{4e00}-\x{9fa5},、。，][a-zA-Z0-9_\s\ \x{4e00}-\x{9fa5}\.]*[a-zA-Z0-9\x{4e00}-\x{9fa5}]+$/u', $value);
        if (!$res) {
            return "只能输入中文";
        } else {
            return true;
        }
    }
}
