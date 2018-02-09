<?php

    //取子类
    function two_column($sid){
            $two_column=model('Column')->where(['parent_id'=>$sid])->select();
            return $two_column;
    }
