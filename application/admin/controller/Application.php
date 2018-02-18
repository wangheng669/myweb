<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Application extends Base
{
    public function index()
    {
        $applicationList = model('application')->all();
        $count            = model('application')->count();
        return $this->fetch('application_list', [
            'applicationList' => $applicationList,
            'count'            => $count,
        ]);
    }

    public function editApplication()
    {
        $application = $this->edit('application');
        $columns     = model('column')->where(['parent_id' => 13])->select();
        return $this->fetch('application_edit', [
            'application' => $application,
            'columns'     => $columns,
        ]);
    }

    public function addApplication()
    {
        //获取栏目信息
        $columns = model('column')->where(['parent_id' => 13])->select();
        return $this->fetch('application_add', [
            'columns' => $columns,
        ]);
    }

    public function saveApplication()
    {
        return $this->operate('Application', $where = false);
    }

    public function applicationEdit()
    {
        return $this->operate('Application', $where = true);
    }

    public function delApplication()
    {
        return $this->delete('Application');
    }
}
