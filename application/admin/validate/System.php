<?php

    namespace app\admin\validate;
    use think\Validate;
    class System extends Validate
    {
        //定义规则
        protected $rule = [
            //标题
            'title'=>'checkChina',
            //关键字
            'keywords'=>'require|checkChina',
            //描述
            'description'=>'require|checkChina',
            //备案号
            'number'=>'require|checkChina',
            //统计代码
            'statistics'=>'require|alphaNum',
            //是否关闭
            'is_close'=>'require|max:1|in:1,0',
        ];
        protected $message=[
            'statistics.alphaNum'=>'统计代码只能是字母或数字',
            'is_close.in'=>'参数错误',
            'is_close.max'=>'参数错误',
            'is_close.require'=>'参数错误',
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
