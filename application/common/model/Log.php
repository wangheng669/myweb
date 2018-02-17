<?php

namespace app\common\model;

use think\Model;

class Log extends Model
{
    //写一个根据排序返回全部列表的方法
    public function getLogAll(){
        $result=$this->paginate(10);
        return $result;
    }
}
