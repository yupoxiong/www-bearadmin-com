<?php
/**
 * 文章验证器
 */

namespace app\common\validate;

class ArticleValidate extends CommonBaseValidate
{
    protected $rule = [
            'category_id|所属分类' => 'require',
    'author_id|所属作者' => 'require',
    'title|标题' => 'require',
    'description|摘要' => 'require',
    'img|缩略图' => 'require',
    'content|正文' => 'require',
    'publish_time|发布时间' => 'require',
    'is_top|是否置顶' => 'require',
    'status|状态' => 'require',

    ];

    protected $message = [
            'category_id.required' => '所属分类不能为空',
    'author_id.required' => '所属作者不能为空',
    'title.required' => '标题不能为空',
    'description.required' => '摘要不能为空',
    'img.required' => '缩略图不能为空',
    'content.required' => '正文不能为空',
    'publish_time.required' => '发布时间不能为空',
    'is_top.required' => '是否置顶不能为空',
    'status.required' => '状态不能为空',

    ];

    protected $scene = [
        'admin_add'     => ['category_id', 'author_id', 'title', 'description', 'img', 'content', 'publish_time', 'is_top', 'status', ],
        'admin_edit'    => ['id', 'category_id', 'author_id', 'title', 'description', 'img', 'content', 'publish_time', 'is_top', 'status', ],
        'admin_del'     => ['id', ],
        'admin_disable' => ['id', ],
        'admin_enable'  => ['id', ],
        'api_add'       => ['category_id', 'author_id', 'title', 'description', 'img', 'content', 'publish_time', 'is_top', 'status', ],
        'api_info'      => ['id', ],
        'api_edit'      => ['id', 'category_id', 'author_id', 'title', 'description', 'img', 'content', 'publish_time', 'is_top', 'status', ],
        'api_del'       => ['id', ],
        'api_disable'   => ['id', ],
        'api_enable'    => ['id', ],
    ];
}
