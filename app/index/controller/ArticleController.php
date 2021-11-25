<?php
/**
 * 文章控制器
 * @author yupoxiong<i@yupoxiong.com>
 */

declare (strict_types=1);

namespace app\index\controller;

use Exception;

class ArticleController extends IndexBaseController
{

    /**
     * 列表
     * @throws Exception
     */
    public function index(): string
    {
        return $this->fetch();
    }


    /**
     * 详情
     * @throws Exception
     */
    public function detail(): string
    {
        return $this->fetch();
    }
}