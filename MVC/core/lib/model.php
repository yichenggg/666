<?php

namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
      $database = conf::all('database');
        try {
            parent::__construct($database['DSN'] ,$database['DB_USER'] ,$database['DB_PWD']);
        } catch (\PDOException $e){
            p($e->getMessage());
        }
        


    
    
    }

	



}