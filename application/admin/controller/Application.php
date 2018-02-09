<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Application extends Base
{
    public function index()
    {
        $application_list=model('application')->all();
        $count=model('application')->count();
        return $this->fetch('application_list',[
            'application_list'=>$application_list,
            'count'=>$count,
        ]);
    }
    public function edit_application()
    {
        $application=$this->edit('application');
        $columns=model('column')->where(['parent_id'=>13])->select();
        return $this->fetch('application_edit',[
            'application'=>$application,
            'columns'=>$columns,
            ]);
    }
    public function add_application()
    {
        //获取栏目信息
        $columns=model('column')->where(['parent_id'=>13])->select();
        return $this->fetch('application_add',[
            'columns'=>$columns,
        ]);
    }
    public function save_application(){
        return $this->operate('Application',$where=false);
    }
    public function application_edit(){
        return $this->operate('Application',$where=true);
    }
    public function del_application(){
        return $this->delete('Application');
    }
}
