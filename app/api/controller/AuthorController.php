<?php
/**
 * 作者控制器
 */

namespace app\api\controller;

use think\response\Json;
use app\api\service\AuthorService;
use app\common\validate\AuthorValidate;
use app\api\exception\ApiServiceException;

class AuthorController extends ApiBaseController
{
    /**
     * 列表
     * @param AuthorService $service
     * @return Json
     */
    public function index(AuthorService $service): Json
    {
        try {
            $data   = $service->getList($this->param, $this->page, $this->limit);
            $result = [
                'author' => $data,
            ];

            return api_success($result);
        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    /**
     * 添加
     * @param AuthorValidate $validate
     * @param AuthorService $service
     * @return Json
     */
    public function add(AuthorValidate $validate, AuthorService $service): Json
    {
        $check = $validate->scene('api_add')->check($this->param);
        if (!$check) {
            return api_error($validate->getError());
        }

        $result = $service->createData($this->param);

        return $result ? api_success() : api_error();
    }

    /**
     * 详情
     * @param AuthorValidate $validate
     * @param AuthorService $service
     * @return Json
     */
    public function info(AuthorValidate $validate, AuthorService $service): Json
    {
        $check = $validate->scene('api_info')->check($this->param);
        if (!$check) {
            return api_error($validate->getError());
        }

        try {

            $result = $service->getDataInfo($this->id);
            return api_success([
                'user_level' => $result,
            ]);

        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    /**
     * 修改
     * @param AuthorService $service
     * @param AuthorValidate $validate
     * @return Json
     */
    public function edit(AuthorService $service, AuthorValidate $validate): Json
    {
        $check = $validate->scene('api_edit')->check($this->param);
        if (!$check) {
            return api_error($validate->getError());
        }

        try {
            $service->updateData($this->id, $this->param);
            return api_success();
        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    /**
     * 删除
     * @param AuthorService $service
     * @param AuthorValidate $validate
     * @return Json
     */
    public function del(AuthorService $service, AuthorValidate $validate): Json
    {
        $check = $validate->scene('api_del')->check($this->param);
        if (!$check) {
            return api_error($validate->getError());
        }

        try {
            $service->deleteData($this->id);
            return api_success();
        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    

    
}
