<?php
/**
 * 分类控制器
 */

namespace app\api\controller;

use think\response\Json;
use app\api\service\CategoryService;
use app\common\validate\CategoryValidate;
use app\api\exception\ApiServiceException;

class CategoryController extends ApiBaseController
{
    /**
     * 列表
     * @param CategoryService $service
     * @return Json
     */
    public function index(CategoryService $service): Json
    {
        try {
            $data   = $service->getList($this->param, $this->page, $this->limit);
            $result = [
                'category' => $data,
            ];

            return api_success($result);
        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    /**
     * 添加
     * @param CategoryValidate $validate
     * @param CategoryService $service
     * @return Json
     */
    public function add(CategoryValidate $validate, CategoryService $service): Json
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
     * @param CategoryValidate $validate
     * @param CategoryService $service
     * @return Json
     */
    public function info(CategoryValidate $validate, CategoryService $service): Json
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
     * @param CategoryService $service
     * @param CategoryValidate $validate
     * @return Json
     */
    public function edit(CategoryService $service, CategoryValidate $validate): Json
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
     * @param CategoryService $service
     * @param CategoryValidate $validate
     * @return Json
     */
    public function del(CategoryService $service, CategoryValidate $validate): Json
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
