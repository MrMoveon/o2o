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

/**
 * @param $status   状态
 * @return string   返回按钮
 */
function status($status){
    if($status==1){
        return '<button class="layui-btn layui-btn-mini layui-btn-normal">正常</button>';
    }elseif($status==0){
        return '<button class="layui-btn layui-btn-mini layui-btn-warm">停用</button>';
    }else{
        return '<button class="layui-btn layui-btn-mini layui-btn-danger">删除</button>';
    }
}

/**
 * @param $url          访问地址
 * @param int $type     0 get 1 post
 * @param $data         传递的数据
 */
function doCurl($url,$type=0,$data=[]){
    //初始化
    $ch=curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);

    //设置为1表示稍后执行的curl_exec函数的返回是URL的返回字符串，而不是把返回字符串定向到标准输出并返回TRUE
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

    //0 不输出header头 1输出
    curl_setopt($ch,CURLOPT_HEADER,0);

    //post
    if($type==1){
        curl_setopt($ch,CURLOPT_POST);
        //传递数据
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    }
    //输出
    $output=curl_exec($ch);
    //关闭句柄
    curl_close($ch);

    return $output;

}