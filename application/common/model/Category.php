<?php
namespace app\common\model;
use think\Model;

class Category extends Model{
    protected $autoWriteTimestamp=true;
    public function add($data){
        $data['status']=1;
        return $this->save($data);
    }
    public function getNormalFirstCategory(){
        return $this->where('parent_id=0')->where("status=1")->select();
    }
}