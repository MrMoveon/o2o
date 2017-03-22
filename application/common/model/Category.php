<?php
namespace app\common\model;
use think\Model;

class Category extends Model{
    /**
     * @var bool 设置自动填充时间
     */
    protected $autoWriteTimestamp=true;
    public $list_rows;
    public function initialize(){
        //获取配置项的分页数
        $this->list_rows=config('paginate.list_rows');
    }

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

    /**
     * @param $current              当前页数（第几页）
     * @param array $conditions     where条件
     * @param array $order          排序条件
     * @return array                返回查询的值
     */
    public function getCategory($current,$conditions=[],$order=[]){
        $where=$conditions;
        $listorder=$order;
        $list_rows=$this->list_rows;
        return $this->where($conditions)->order($listorder)->page($current,$list_rows)->column('*', 'id');
    }

    /**
     * @return int|string   统计总数
     */
    public function getCount($parent_id=0,$status=1){
        $where=[
            'parent_id'=>$parent_id,
            'status'=>$status
        ];
        return $this->where($where)->count();
    }

    /**
     * @return float 得到分页数
     */
    public function getPages(){
        //总数
        $count=$this->getCount();
        //分页数
        $pages=ceil($count/$this->list_rows);

        return $pages;
    }


}