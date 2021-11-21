<?php
declare (strict_types=1);

namespace app\command;

use app\common\service\StringService;
use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\facade\Log;

class AppKey extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('generate:app_key')
            ->setDescription('生成新的APP_KEY');
    }

    protected function execute(Input $input, Output $output)
    {
        $env    = app()->getRootPath() . '.env';
        $search = 'APP_KEY=' . config('app.app_key');
        $key    = sha1(uniqid('app_key', true));
        $result = file_put_contents($env, str_replace($search, 'APP_KEY=' . $key, file_get_contents($env)));
        if ($result) {
            $output->writeln('新的APP_KEY生成成功，值为：' . $key);
        }
    }
}
