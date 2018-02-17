<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Jobs extends Base
{
    public function index()
    {
        $jobs_list=model('jobs')->select();
        $count=model('jobs')->count();
        return $this->fetch('jobs_list',[
            'count'=>$count,
            'jobs_list'=>$jobs_list,
        ]);
    }
     public function edit_jobs()
    {
        $jobs=$this->edit('jobs');
        return $this->fetch('jobs_edit',[
            'jobs'=>$jobs,
        ]);
    }
    public function add_jobs()
    {
        return $this->fetch('jobs_add');
    }
    public function save_jobs(){
        return $this->operate('Jobs',$where=false);
    }
    public function jobs_edit(){
        return $this->operate('Jobs',$where=true);
    }
    public function del_jobs(){
        return $this->delete('Jobs');
    }
}
