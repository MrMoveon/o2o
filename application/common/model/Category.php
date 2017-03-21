<?php
namespace app\common\model;
use think\Model;

class Category extends Model{
    /**
     * @var bool 设置自动填充时间
     */
    protected $autoWriteTimestamp=true;

    /**
     * @param $data 添加的数据
     * @return false|int
     */
    public function add($data){
        $data['status']=1;
        return $this->save($data);
    }

    /**
     * @return 得到一级栏目
     */

    public function getNormalFirstCategory(){
        $where=[
            'parent_id'=>0,
            'status'=>1
        ];
        $order=[
            'id'=>'desc',
            'listorder'=>'desc'
        ];
        return $this->where($where)->order($order)->select();
    }

    public function getCategory($current,$showNum,$conditions=[],$order=[]){
        $where=$conditions;
        $listorder=$order;
        return $this->where($conditions)->order($listorder)->page($current,$showNum)->column('*', 'id');
    }

    /**
     * @return int|string   统计总数
     */
    public function getCount(){
        $where=[
            'parent_id'=>0,
            'status'=>1
        ];
        $order=[
            'id'=>'desc',
            'listorder'=>'desc'
        ];
        return $this->where($where)->order($order)->count();
    }


}