<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Article extends Migrator
{
    public function change()
    {
        $table = $this->table('article', ['comment' => '文章', 'engine' => 'InnoDB', 'encoding' => 'utf8mb4', 'collation' => 'utf8mb4_unicode_ci']);
        $table
            ->addColumn('category_id', 'integer', ['signed' => false, 'limit' => 10, 'default' => 0, 'comment' => '所属分类'])
            ->addColumn('author_id', 'integer', ['signed' => false, 'limit' => 10, 'default' => 0, 'comment' => '所属作者'])
            ->addColumn('title', 'string', ['limit' => 100, 'default' => '', 'comment' => '标题'])
            ->addColumn('description', 'string', ['limit' => 200, 'default' => '', 'comment' => '摘要'])
            ->addColumn('img', 'string', ['limit' => 255, 'default' => '', 'comment' => '缩略图'])
            ->addColumn('content', 'text', [ 'comment' => '正文'])
            ->addColumn('publish_time', 'integer', ['signed' => false, 'limit' => 10, 'default' => 0, 'comment' => '发布时间'])
            ->addColumn('is_top', 'boolean', ['signed' => false, 'limit' => 1, 'default' => 0, 'comment' => '是否置顶'])
            ->addColumn('status', 'boolean', ['signed' => false, 'limit' => 1, 'default' => 1, 'comment' => '状态'])// 0：草稿，1发布，2撤回
            ->addColumn('create_time', 'integer', ['signed' => false, 'limit' => 10, 'default' => 0, 'comment' => '创建时间'])
            ->addColumn('update_time', 'integer', ['signed' => false, 'limit' => 10, 'default' => 0, 'comment' => '更新时间'])
            ->addColumn('delete_time', 'integer', ['signed' => false, 'limit' => 10, 'default' => 0, 'comment' => '删除时间'])
            ->create();
    }
}
