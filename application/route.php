<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    'about/:id'=>  'about/index',
    'news/'=>  'news/index?id=10',
    'news/industry'=>  'news/index?id=11',
    'news/activity'=>  'news/index?id=12',
    'news/list/:id'=>  'news/list/',
    'application/list/:id'=>  'index/application/list',
    'product/:id'=>    'product/index',
    'category/:id'=>    'category/index',
    'jobs/:type'=>    'jobs/index',
    'jobs/idea' => 'jobs/idea',
];
