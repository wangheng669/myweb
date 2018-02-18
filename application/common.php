<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//取子分类
function two_column($sid)
{
    $two_column = model('Column')->where(['parent_id' => $sid])->select();
    return $two_column;
}

//栏目
function column($value)
{
    $result = model('column')->get($value);
    return $result['column_name'];
}
