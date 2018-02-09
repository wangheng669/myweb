<?php

    namespace app\admin\validate;
    use think\Validate;
    class Banner extends Validate
    {
        //定义规则
        protected $rule = [
            //id
            'id'=>'number',
            'image'=>'imageSrc',
            'link'=>'require|url',
            'description'=>'checkChina|max:150',
        ];
        protected $message=[
            'id.number'=>'请勿修改',
            'link.url'=>'请填写正确的url地址',
            'description.max'=>'最大不能超过50字',
            'links.require'=>'不能为空',
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
        protected function imageSrc($value)
        {
            $res = preg_match_all('/^[a-zA-Z0-9\\\\\\.]+$/', $value);
            if (!$res) {
                return "不是有效的路径";
            } else {
                return true;
            }
        }
    }
