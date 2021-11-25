<?php
/**
 * 导航控制器
 */

namespace app\api\controller;

use think\response\Json;
use app\api\service\NavService;
use app\common\validate\NavValidate;
use app\api\exception\ApiServiceException;

class NavController extends ApiBaseController
{
    /**
     * 列表
     * @param NavService $service
     * @return Json
     */
    public function index(NavService $service): Json
    {
        try {
            $data   = $service->getList($this->param, $this->page, $this->limit);
            $result = [
                'nav' => $data,
            ];

            return api_success($result);
        } catch (ApiServiceException $e) {
            return api_error($e->getMessage());
        }
    }

    /**
     * 添加
     * @param NavValidate $validate
     * @param NavService $service
     * @return Json
     */
    public function add(NavValidate $validate, NavService $service): Json
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
     * @param NavValidate $validate
     * @param NavService $service
     * @return Json
     */
    public function info(NavValidate $validate, NavService $service): Json
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
     * @param NavService $service
     * @param NavValidate $validate
     * @return Json
     */
    public function edit(NavService $service, NavValidate $validate): Json
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
     * @param NavService $service
     * @param NavValidate $validate
     * @return Json
     */
    public function del(NavService $service, NavValidate $validate): Json
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
