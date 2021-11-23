#!/bin/bash

echo ""
#输出当前时间
date --date='0 days ago' "+%Y-%m-%d %H:%M:%S"
echo "Start"
#git项目路径
gitPath="/www/wwwroot/www.bearadmin.com"
#git 网址
gitHttp="git@github.com:yupoxiong/www-bearadmin-com.git"
echo "Web站点路径：$gitPath"
#判断项目路径是否存在
if [ -d "$gitPath" ]; then
        cd $gitPath
        echo "拉取最新的项目文件"
        sudo git fetch --all
        sudo git reset --hard origin/master
        sudo -u root git pull
        echo "设置目录权限"
        sudo chown -R www:www $gitPath
        echo "代码拉取完成"
        exit
fi