<?php

namespace app\admin\model;

use think\Model;
use think\Collection;

class Column extends Model
{
    //获取栏目
    public static function getColumn($pid=0,&$result=[],$blank=0){
        //栏目查询
        $res=self::all(['parent_id'=>$pid]);
        $blank+=2;
        foreach($res as $value){
            $column_name='|--'.$value->column_name;
            $value->column_name=str_repeat('&nbsp',$blank).$column_name;
            $result[]=$value;
            self::getColumn($value->id,$result,$blank);
        }
        return Collection::make($result)->toArray();
    }
}
