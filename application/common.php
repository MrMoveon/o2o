<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * @param $status 状态码 1成功 0失败
 * @param $message 返回的信息
 * @param array $data 传递的数据
 */
function show($status,$message,$data=array()){
    $result=[
        'status'=>$status,
        'message'=>$message,
        'data'=>$data
    ];
    exit(json_encode($result));

}
function status($status){
    if($status==1){
        return '<button class="layui-btn layui-btn-mini layui-btn-normal">正常</button>';
    }elseif($status==0){
        return '<button class="layui-btn layui-btn-mini layui-btn-warm">停用</button>';
    }else{
        return '<button class="layui-btn layui-btn-mini layui-btn-danger">删除</button>';
    }
}