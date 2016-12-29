<?php

namespace core;

class mvc
{
	public static $classMap = array();
	public $assign;
	public function assign($name,$value)
	{
	    $this->assign[$name] = $value;
	}

	public function display($file)
	{
	    $file = './APP/views/' . $file;
	    if(is_file($file))
	    {
	        extract($this->assign);
	        include $file;
	    }
	}

	static  public  function run()
	{
		\core\lib\log::init();
		// \core\lib\log::log($_SERVER,'server');//参数,存储文件名
		$route = new \core\lib\route();
        // var_dump($route);die;
		$ctrlname = ucfirst($route->controller);

        $ActionName = $route->action;
        $ctrf =  './APP/controllers/' . $ctrlname . 'Controller.php';
      
        $ControllerClass = '\\' . MODULE .'\controllers\\' . $ctrlname . 'Controller';
       
        if(is_file($ctrf)){
            include $ctrf;
            $controller = new $ControllerClass();
            $controller->$ActionName();
            \core\lib\log::log('ControllerClass:'.$ControllerClass.'     '.'action:'.$ActionName );
        }else{
             throw new \ErrorException("Not  fountd".$ctrlname);    
        }
	}
	static public  function load($class)
	{
		//类的自动加载
		if(isset($classMap[$class]))
		{
			return true;
		}
		else
		{		
			$class=str_replace('\\', '/', $class);
			$file= MVC .'/'. $class . '.php';
			if(is_file($file))
			{
				include $file;
				self::$classMap[$class]=$class;
			}
			else
			{
				return false;
			}
		}
	}
	
}