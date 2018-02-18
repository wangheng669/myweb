<?php

namespace app\admin\validate;

use think\Validate;

class About extends Validate
{
    //定义规则
    protected $rule    = [
        //id
        'id'      => 'number',
        'year'    => 'require',
        'month'   => 'require',
        'content' => 'require',
    ];
    protected $message = [
        'id.number'       => '请勿修改',
        'content.require' => '内容不能为空',
        'year.require'    => '日期不能为空',
        'month.require'   => '日期不能为空',
    ];
}
