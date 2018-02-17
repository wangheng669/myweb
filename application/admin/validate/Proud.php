<?php

namespace app\admin\validate;

use think\Validate;

class Proud extends Validate
{
    //定义规则
    protected $rule = [
        'id' => 'number',
        'title' => 'require',
        'image' => 'require',
    ];
    protected $message = [
        'id.number' => '请勿修改',
        'title.require' => '标题不能为空',
        'image.require' => '图片不能为空',
    ];
}
