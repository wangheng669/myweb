<?php

namespace app\admin\controller;


use app\admin\common\Base;

class News extends Base
{
    public function index()
    {
        $newsList = model('news')->all();
        $count     = model('news')->count();
        return $this->fetch('news_list', [
            'newsList' => $newsList,
            'count'     => $count,
        ]);
    }

    public function editNews()
    {
        $news = $this->edit('news');
        //获取二级栏目
        $column = model('column')->where('parent_id', 'EQ', 1)->select();
        return $this->fetch('news_edit', [
            'news'   => $news,
            'column' => $column,
        ]);
    }

    public function addNews()
    {
        //获取二级栏目
        $column = model('column')->where('parent_id', 'EQ', 1)->select();
        return $this->fetch('news_add', [
            'column' => $column,
        ]);
    }

    public function saveNews()
    {
        return $this->operate('News', $where = false);
    }

    public function newsEdit()
    {
        return $this->operate('News', $where = true);
    }

    public function delNews()
    {
        return $this->delete('News');
    }

    public function sreachNews()
    {
        //判断搜索是否填写完善
        $status    = 0;
        $message   = '请填写完整';
        $post_data = request()->post();
        if (empty($post_data['startTime']) || empty($post_data['username'])) {
            $data = [
                'status'  => $status,
                'message' => $message,
            ];
            return $data;
        }
        //将时间转换为时间戳格式
        $startTime = strtotime($post_data['startTime']);
        $news_list = model('News')->where('create_time', 'EGT', $startTime)->where('title', 'LIKE', "%" . $post_data['username'] . "%")->select();
        foreach ($news_list as $k => $v) {
            $result[] = '<tr><td>
                <input type="checkbox" value="1" name="">
                </td>
                <td>' .
                $v['id'] . '
                </td>
                <td>
                    <a href="/index/news/list?id="' . $v['id'] . '">' . $v['title'] . '</a>
                </td>
                <td >' .
                $v['column_id']
                . '</td>
                <td >
                    ' . $v['form'] . '
                </td>
                <td >
                        ' . $v['create_time'] . '
                </td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="show("编辑","","","600")"
                    class="ml-5" style="text-decoration:none">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" href="javascript:;" onclick="del()
                    style="text-decoration:none">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
            </td></tr>';
        }
        return $result;
    }
}
