# shiroi_frame

#### 介绍
shiroi 自制框架 (第一个脚手架)

#### 软件架构
初始的目录结构如下：
~~~
├─config                所有配置的目录
|   ├─config.php        基础配置文件
|   └─database.php      数据库配置文件
├─index                 应用目录(可自定义|无要求)        
├─shiroi                框架系统目录
|   ├─resource          框架类库目录
|   |  ├─Config.php     模块配置文件
|   |  ├─FileHandle.php 文件操作类文件
|   |  ├─Loader.php     框架注册类文件
|   |  ├─Mysql.php      mysqli注册类文件(基于composer)
|   |  └─Route.php      路由注册类文件
|   ├─base.php          基础定义文件
|   └─run.php           框架入口文件
├─vendor                第三方类库目录（Composer依赖库）
├─composer.json         composer 定义文件
├─README.md             README 文件
├─.gitignore            git忽略文件
~~~

#### 安装教程
**支持composer下载项目**

    composer create-project shiroi/shiroi_frame
    
**设置nginx和apache**

    nginx配置:    
    if (!-e $request_filename){
        rewrite ^/(.*)$ /index.php/$1 last;
    }
    
    apache配置:
    1.找到配置文件httpd.conf,寻找LoadModule rewrite_module...,并去点前面的#号
    2.将httpd.conf文件里面的所有AllowOverride None都改为AllowOverride All
    3.项目下创建.htaccess文件,并在文件内加入:
        RewriteEngine on 
        RewriteCond %{REQUEST_FILENAME} !-d 
        RewriteCond %{REQUEST_FILENAME} !-f 
        RewriteRule ^(.*)$ index.php/$1 [L] 
    
**配置hosts文件**
    
    hosts文件下新增 127.0.0.1 example.com
    
#### 使用说明

1.  本框架支持php5.6以上

#### 参与贡献

1.  Fork 本仓库
2.  新建 Feat_xxx 分支
3.  提交代码
4.  新建 Pull Request
