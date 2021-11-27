<?php
/**
 * 作者验证器
 */

namespace app\common\validate;

class AuthorValidate extends CommonBaseValidate
{
    protected $rule = [
            'name|名称' => 'require',
    'status|是否启用' => 'require',

    ];

    protected $message = [
            'name.required' => '名称不能为空',
    'status.required' => '是否启用不能为空',

    ];

    protected $scene = [
        'admin_add'     => ['name', 'status', ],
        'admin_edit'    => ['id', 'name', 'status', ],
        'admin_del'     => ['id', ],
        'admin_disable' => ['id', ],
        'admin_enable'  => ['id', ],
        'api_add'       => ['name', 'status', ],
        'api_info'      => ['id', ],
        'api_edit'      => ['id', 'name', 'status', ],
        'api_del'       => ['id', ],
        'api_disable'   => ['id', ],
        'api_enable'    => ['id', ],
    ];
}
