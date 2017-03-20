<?php
namespace app\index\controller;

use think\Controller;

class Category extends Controller
{
    private $obj;
    public function _initialize(){
        $this->obj=model('Category');
    }
    public function index()
    {
       return $this->fetch();
    }
    public function add(){
        return $this->fetch("",[
            'category'=>$this->obj->getNormalFirstCategory()
        ]);
    }
    public function save(){
      $data=input('post.');
      $validate=validate('Category');
      if(!$validate->scene('add')->check($data)){
         return  $validate->getError();
      }
      if($res= $this->obj->add($data)){
         return $this->show(1,'生活分类添加成功！');
      }else{
          return $this->show(0,'生活分类添加失败！');
      }
    }
    public function show($status,$message,$data=array()){
        $result=[
            'status'=>$status,
            'message'=>$message,
            'data'=>$data
        ];
        exit(json_encode($result));

    }
}
