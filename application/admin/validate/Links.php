<?php

    namespace app\admin\validate;
    use think\Validate;
    class Links extends Validate
    {
        //定义规则
        protected $rule = [
            //id
            'id'=>'number',
            //标题
            'title'=>'checkChina',
            //链接名称
            'link_name'=>'require|checkChina',
            //url
            'url'=>'require|url',
            //排序
            'sort'=>'number',
        ];
        protected $message=[
            'link_name.require'=>'链接名称不能为空',
            'url.require'=>'地址不能为空',
            'sort.number'=>'请填写数字',
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
