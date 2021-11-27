<?php
/**
 * 分类验证器
 */

namespace app\common\validate;

class CategoryValidate extends CommonBaseValidate
{
    protected $rule = [
        'name|名称'         => 'require',
        'img|图片'          => 'require',
        'sort_number|排序号' => 'require',
        'status|是否启用'     => 'require',

    ];

    protected $message = [
        'name.required'        => '名称不能为空',
        'img.required'         => '图片不能为空',
        'sort_number.required' => '排序号不能为空',
        'status.required'      => '是否启用不能为空',

    ];

    protected $scene = [
        'admin_add'     => ['name', 'sort_number', 'status',],
        'admin_edit'    => ['id', 'name', 'sort_number', 'status',],
        'admin_del'     => ['id',],
        'admin_disable' => ['id',],
        'admin_enable'  => ['id',],
        'api_add'       => ['name', 'sort_number', 'status',],
        'api_info'      => ['id',],
        'api_edit'      => ['id', 'name', 'sort_number', 'status',],
        'api_del'       => ['id',],
        'api_disable'   => ['id',],
        'api_enable'    => ['id',],
    ];
}
