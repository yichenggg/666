<?php
/**入口文件
*  1.定义变量
*  2.加载函数库
*  3.启动框架
*/
//一  定义常量
define('MVC',getcwd());	//当前框架的根目录	
define('CORE','MVC'.'/core');//框架核心文件夹
define('APP','MVC'.'/app');//项目文件
define('MODULE', 'app');
define('DEBUG',true);//是否开启调错模式 默认true

include "vendor/autoload.php";

if(DEBUG)
{
	$monolog=new \Whoops\Run;
	$errorTitle='框架出错了';
	$option =new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($errorTitle);
	$monolog->pushHandler($option);
	$monolog->register();
	ini_set('display_error','On');
}
else
{
	ini_set('display_error','Off');
}

// dump($_SERVER);exit;
//加载函数库
include './core/common/function.php';


include './core/mvc.php';

spl_autoload_register('\core\mvc::load');//当没有类加载时加载此类

\core\mvc::run();








