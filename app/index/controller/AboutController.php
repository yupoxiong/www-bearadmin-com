<?php
/**
 *
 * @author yupoxiong<i@yupoxiong.com>
 */

declare (strict_types=1);


namespace app\index\controller;


use Exception;

class AboutController extends IndexBaseController
{


    /**
     * 列表
     * @throws Exception
     */
    public function index(): string
    {
        return $this->fetch();
    }

}