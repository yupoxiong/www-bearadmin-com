<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Nav extends Migrator
{

    public function change()
    {
        $table = $this->table('nav', ['comment' => '导航', 'engine' => 'InnoDB', 'encoding' => 'utf8mb4', 'collation' => 'utf8mb4_unicode_ci']);
        $table
            ->addColumn('name', 'string', ['limit' => 30, 'default' => '', 'comment' => '名称'])
            ->addColumn('url', 'string', ['limit' => 100, 'default' => '', 'comment' => '链接'])
            ->addColumn('sort_number', 'integer', ['signed' => false, 'limit' => 10, 'default' => 1000, 'comment' => '排序号'])
            ->addColumn('status', 'boolean', ['signed' => false, 'limit' => 1, 'default' => 1, 'comment' => '是否启用'])
            ->addColumn('create_time', 'integer', ['signed' => false, 'limit' => 10, 'default' => 0, 'comment' => '创建时间'])
            ->addColumn('update_time', 'integer', ['signed' => false, 'limit' => 10, 'default' => 0, 'comment' => '更新时间'])
            ->addColumn('delete_time', 'integer', ['signed' => false, 'limit' => 10, 'default' => 0, 'comment' => '删除时间'])
            ->addIndex(['url'], ['name' => 'idx_url'])
            ->create();
    }
}
