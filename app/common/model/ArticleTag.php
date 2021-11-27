<?php
/**
 * 文章标签模型
*/

namespace app\common\model;

use think\model\concern\SoftDelete;

class ArticleTag extends CommonBaseModel
{
    use SoftDelete;
    // 自定义选择数据
    

    protected $name = 'article_tag';
    protected $autoWriteTimestamp = true;

    // 可搜索字段
    public array $searchField = [];

    // 可作为条件的字段
    public array $whereField = [];

    // 可做为时间
    public array $timeField = [];

    

    /**
    * 关联文章
    */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }/**
    * 关联标签
    */
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

}
