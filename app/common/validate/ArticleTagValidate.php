<?php
/**
 * 文章标签验证器
 */

namespace app\common\validate;

class ArticleTagValidate extends CommonBaseValidate
{
    protected $rule = [
            'article_id|所属文章' => 'require',
    'tag_id|所属标签' => 'require',
    'status|是否启用' => 'require',

    ];

    protected $message = [
            'article_id.required' => '所属文章不能为空',
    'tag_id.required' => '所属标签不能为空',
    'status.required' => '是否启用不能为空',

    ];

    protected $scene = [
        'admin_add'     => ['article_id', 'tag_id', 'status', ],
        'admin_edit'    => ['id', 'article_id', 'tag_id', 'status', ],
        'admin_del'     => ['id', ],
        'admin_disable' => ['id', ],
        'admin_enable'  => ['id', ],
        'api_add'       => ['article_id', 'tag_id', 'status', ],
        'api_info'      => ['id', ],
        'api_edit'      => ['id', 'article_id', 'tag_id', 'status', ],
        'api_del'       => ['id', ],
        'api_disable'   => ['id', ],
        'api_enable'    => ['id', ],
    ];
}
