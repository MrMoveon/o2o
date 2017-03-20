<?php
namespace app\index\validate;
use think\Validate;

class Category extends Validate {

    protected $rule=[
            ['name',"require|max:20","分类名不能为空|分类名不能超过20个字符"],
            ['parent_id',"number","栏目id必须为数字"],
            ['listorder',"require|number","排序不能为空|排序数字不合法"],
            ['status',"number|in:-1,0,1","状态只能是数字|状态不合法"],
        ];
    protected $scene=[
        'add'=>['name','parent_id','status','listorder'],
        'listorder'=>['listorder','status']
    ];
}