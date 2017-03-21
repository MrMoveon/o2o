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
       $category=$this->obj->getNormalFirstCategory();

        return $this->fetch("",[
            'category'=>$category
        ]);
    }
    public function add(){
        $category=$this->obj->getNormalFirstCategory();
        return $this->fetch("",[
            'category'=>$category
        ]);
    }
    public function save(){
      $data=input('post.');
      $validate=validate('Category');
      if(!$validate->scene('add')->check($data)){
         return  $validate->getError();
      }
      if($res= $this->obj->add($data)){
         return show(1,'生活分类添加成功！');
      }else{
          return show(0,'生活分类添加失败！');
      }
    }

    public function ajaxPage($current=1){
        //一页多少行
        $pageNum=2;
        //总数
        $count=$this->obj->getCount();
        //分页数
        $pages=ceil($count/$pageNum);


        //查询条件
        $conditions=[
            'parent_id'=>0,
            'status'=>1
        ];
        //排序
        $order=[
            'id'=>'desc',
            'listorder'=>'desc'
        ];
        //获取分类数据
        $category=$this->obj->getCategory($current,$pageNum,$conditions,$order);
        $category['count']=$count;


        //返回json
        return show(1,'请求成功',$category);
    }

}
