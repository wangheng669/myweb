<?php

namespace app\admin\controller;

use app\admin\common\Base;

class About extends Base
{
    public function index()
    {
        $aboutList = model('about')->all();
        $count      = model('about')->count();
        return $this->fetch('about_list', [
            'aboutList' => $aboutList,
            'count'      => $count,
        ]);
    }

    public function proud()
    {
        $proudList = model('proud')->all();
        $count      = model('proud')->count();
        return $this->fetch('proud_list', [
            'proudList' => $proudList,
            'count'      => $count,
        ]);
    }

    public function editAbout()
    {
        $about = $this->edit('about');
        return $this->fetch('about_edit', [
            'about' => $about,
        ]);
    }

    public function editProud()
    {
        $proud = $this->edit('proud');
        return $this->fetch('proud_edit', [
            'proud' => $proud,
        ]);
    }

    public function addAbout()
    {
        return $this->fetch('about_add');
    }

    public function addProud()
    {
        return $this->fetch('proud_add');
    }

    public function saveAbout()
    {
        return $this->operate('About', $where = false);
    }

    public function saveProud()
    {
        return $this->operate('Proud', $where = false);
    }

    public function aboutEdit()
    {
        return $this->operate('About', $where = true);
    }

    public function proudEdit()
    {
        return $this->operate('Proud', $where = true);
    }

    public function delAbout()
    {
        return $this->delete('About');
    }

    public function delProud()
    {
        return $this->delete('Proud');
    }
}
