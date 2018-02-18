<?php

namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    //定义规则
    protected $rule    = [
        //id
        'id'          => 'number',
        'category_id' => 'require',
        'content'     => 'require',
    ];
    protected $message = [
        'id.number'           => '请勿修改',
        'content.require'     => '内容不能为空',
        'category_id.require' => '不能为空',
    ];
}
