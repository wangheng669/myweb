<?php
namespace app\index\common;

use think\Controller;

class Base extends Controller
{
    //检测网站是否关闭
    public function webStatus(){
        $system=model('app\admin\model\System');
        $result=$system->get(1);
        if($result->is_close==0){
            $this->error('网站已关闭');
        }
    }
}
