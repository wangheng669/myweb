<?php

namespace app\admin\controller;

use app\admin\common\Base;

class About extends Base
{
    public function index()
    {
        $about_list=model('about')->all();
        $count=model('about')->count();
        return $this->fetch('about_list',[
            'about_list'=>$about_list,
            'count'=>$count,
        ]);
    }
    public function proud(){
        $proud_list = model('proud')->all();
        $count = model('proud')->count();
        return $this->fetch('proud_list', [
            'proud_list' => $proud_list,
            'count' => $count,
        ]);
    }
    public function edit_about()
    {
        $about=$this->edit('about');
        return $this->fetch('about_edit',[
            'about'=>$about,
            ]);
    }
    public function edit_proud()
    {
        $proud=$this->edit('proud');
        return $this->fetch('proud_edit',[
            'proud'=>$proud,
            ]);
    }
    public function add_about()
    {
        return $this->fetch('about_add');
    }
    public function add_proud()
    {
        return $this->fetch('proud_add');
    }
    public function save_about(){
        return $this->operate('About',$where=false);
    }
    public function save_proud(){
        return $this->operate('Proud',$where=false);
    }
    public function about_edit(){
        return $this->operate('About',$where=true);
    }
    public function proud_edit(){
        return $this->operate('Proud',$where=true);
    }
    public function del_about(){
        return $this->delete('About');
    }
    public function del_proud(){
        return $this->delete('Proud');
    }
}
