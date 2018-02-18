<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Jobs extends Base
{
    public function index()
    {
        $jobsList = model('jobs')->select();
        $count     = model('jobs')->count();
        return $this->fetch('jobs_list', [
            'count'     => $count,
            'jobsList' => $jobsList,
        ]);
    }

    public function editJobs()
    {
        $jobs = $this->edit('jobs');
        return $this->fetch('jobs_edit', [
            'jobs' => $jobs,
        ]);
    }

    public function addJobs()
    {
        return $this->fetch('jobs_add');
    }

    public function saveJobs()
    {
        return $this->operate('Jobs', $where = false);
    }

    public function jobsEdit()
    {
        return $this->operate('Jobs', $where = true);
    }

    public function delJobs()
    {
        return $this->delete('Jobs');
    }
}
