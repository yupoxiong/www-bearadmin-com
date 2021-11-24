<?php
// 应用公共文件

use think\facade\Config;
use think\db\exception\DbException;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;

if (!function_exists('setting')) {
    /**
     * 设置相关助手函数
     * @return mixed
     */
    function setting($name = '', $default = null)
    {
        if (Config::has($name)) {
            return Config::get($name);
        }
        return get_database_setting($name, $default);
    }
}

if (!function_exists('get_database_setting')) {
    /**
     * 获取数据库配置
     * @param string $name
     * @param mixed $default
     * @return array|mixed|null
     */
    function get_database_setting(string $name = '', $default = null)
    {
        if (empty($name)) {
            // 获取所有的setting
            try {
                $all = (new app\common\model\SettingGroup)->select();
                if ($all->isEmpty()) {
                    return $default;
                }
                $result = [];
                foreach ($all as $item) {
                    foreach ($item->setting as $setting) {
                        $key_setting = [];
                        foreach ($setting->content as $content) {
                            $key_setting[$content['field']] = $content['content'];
                        }
                        $result[$setting->code] = $key_setting;
                    }
                }
                return $result;
            } catch (DataNotFoundException | ModelNotFoundException | DbException $e) {
                return $default;
            }
        }

        $name_arr = explode('.', $name);

        $group = (new app\common\model\SettingGroup)
            ->where('code', '=', $name_arr[0])
            ->findOrEmpty();
        if ($group->isEmpty()) {
            return $default;
        }
        $name_count = count($name_arr);
        if ($name_count === 1) {
            $result = [];
            // 获取分组下所有的
            foreach ($group->setting as $setting) {
                $key_setting = [];
                foreach ($setting->content as $content) {
                    $key_setting[$content['field']] = $content['content'];
                }
                $result[$setting->code] = $key_setting;
            }
            if (empty($result)) {
                return $default;
            }
            return $result;
        }

        if ($name_count === 2) {
            $result = [];
            if (empty($name_arr[1])) {
                foreach ($group->setting as $setting) {
                    $key_setting = [];
                    foreach ($setting->content as $content) {
                        $key_setting[$content['field']] = $content['content'];
                    }
                    $result[$setting->code] = $key_setting;
                }
            } else {
                $setting = (new app\common\model\Setting)->where('code', '=', $name_arr[1])->findOrEmpty();
                if ($setting->isEmpty()) {
                    return $default;
                }
                foreach ($setting->content as $content) {
                    $result[$content['field']] = $content['content'];
                }
            }
            if (empty($result)) {
                return $default;
            }
            return $result;
        }

        if ($name_count === 3) {
            $setting = (new app\common\model\Setting)->where('code', '=', $name_arr[1])->findOrEmpty();
            if ($setting->isEmpty()) {
                return $default;
            }
            foreach ($setting->content as $content) {
                if ($content['field'] === $name_arr[2]) {
                    return $content['content'];
                }
            }
            return $default;
        }
        return $default;
    }
}


if (!function_exists('format_size')) {
    /**
     * 格式化文件大小单位
     * @param $size
     * @param string $delimiter
     * @return string
     */
    function format_size($size, string $delimiter = ''): string
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        for ($i = 0; $size >= 1024 && $i < 5; $i++) {
            $size /= 1024;
        }
        return round($size, 2) . $delimiter . $units[$i];
    }
}