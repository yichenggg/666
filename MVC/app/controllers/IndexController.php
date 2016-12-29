<?php

namespace app\controllers;
use core\lib\model;
class IndexController extends \core\mvc
{
    public function index()
    {
        // p("this is index");
        $model=new \app\model\userModel();
  		// $data=array(
  		// 	'name'=>'mvp',
  		// 	'pwd'=>'132'
  		// 	);

  		$ret = $model->lists();
  		dump($ret);
        
       
    }
}