<?php
namespace Zend\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Config\Factory;

class MainModelDriver extends Adapter{
    public static $_confReader = null;
    private static $_confFileName = "./config/application.config.php";
    private static $_dbinstance = null;
   
    
   function __construct($driver , Platform\PlatformInterface $platform = null, \Zend\Db\ResultSet\ResultSetInterface $queryResultPrototype = null, Profiler\ProfilerInterface $profiler = null) {
       
       parent::__construct($driver, $platform, $queryResultPrototype, $profiler);
   }
   
   public static function getInstance($changeDriver = null){

       if($changeDriver == null){           
         if(self::$_dbinstance == false){         
            self::$_confReader = Factory::fromFile(self::$_confFileName);              
            return self::$_dbinstance = new MainModelDriver(self::$_confReader['db_data']); 
         }else return self::$_dbinstance;
      } 
   }

} 


