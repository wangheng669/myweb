<?php

namespace app\common\model;

use think\Model;

class Links extends Model
{
    //写一个根据排序返回全部列表的方法
    public function getLinksAll(){
        $order=[
            'sort'=>'desc'
        ];
        $result=$this->order($order)->paginate(5);
        return $result;
    }
}
