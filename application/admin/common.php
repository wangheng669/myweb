<?php
//管理员状态
function status($status)
{
    switch ($status) {
        case 1:
            $str = '<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>';
            return $str;
        case 0:
            $str = '<span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>';
            return $str;
    }
}

//产品
function product($value)
{
    $result = model('product')->get($value);
    return $result['name'];
}