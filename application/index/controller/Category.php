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

    /**
     * @return array|void   添加数据
     */
    public function save(){
      if(!request()->isPost()){
          return $this->error('请求不合法');
      }
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

    /**
     * @return mixed    获取分页数
     */
    public function pages(){
        return show(1,'请求成功',['pages'=>$this->obj->getPages()]);
    }

    /**
     * ajax分页
     */
    public function ajaxPage(){
        if(!request()->isAjax()){
            return $this->error('请求不合法');
        }
        $current=input('post.current',1,'intval');


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
        $category=$this->obj->getCategory($current,$conditions,$order);
        $data['list']=$category;
        //返回json
        return show(1,'请求成功',$data);
    }

}
