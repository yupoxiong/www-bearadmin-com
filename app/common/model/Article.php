<?php
/**
 * 文章模型
*/

namespace app\common\model;

use think\model\concern\SoftDelete;

class Article extends CommonBaseModel
{
    use SoftDelete;
    // 自定义选择数据
    

    protected $name = 'article';
    protected $autoWriteTimestamp = true;

    // 可搜索字段
    public array $searchField = ['title','description',];

    // 可作为条件的字段
    public array $whereField = [];

    // 可做为时间
    public array $timeField = [];

    /**
 * 发布时间获取器
*/
public function getPublishTimeAttr($value)
{
    return date('Y-m-d H:i:s',$value);
}

/**
 * 发布时间修改器
*/
public function setPublishTimeAttr($value)
{
    return strtotime($value);
}/**
 * 是否置顶获取器
*/
public function getIsTopTextAttr($value, $data): string
{
    return self::BOOLEAN_TEXT[$data['is_top']];
}/**
 * 状态获取器
*/
public function getStatusTextAttr($value, $data): string
{
    return self::BOOLEAN_TEXT[$data['status']];
}

    /**
    * 关联文章标签
    */
    public function articleTag()
    {
        return $this->hasMany(ArticleTag::class);
    }/**
    * 关联分类
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }/**
    * 关联作者
    */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}
