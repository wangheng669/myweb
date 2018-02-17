<?php

namespace app\common\model;

use think\Model;

class News extends Model
{
    //写一个根据排序返回全部列表的方法
    public function getNewsAll(){
        $result=$this->paginate(10);
        return $result;
    }
}
