<?php
//namespace Zend\Db\Adapter;

//use Zend\Mvc\Application;

class MainModelDriver  {
   private static $_dbinstance = null;
   public static $_confReader = null;
    
//   function __construct($driver, Platform\PlatformInterface $platform = null, \Zend\Db\ResultSet\ResultSetInterface $queryResultPrototype = null, Profiler\ProfilerInterface $profiler = null) {
//       $this->_confReader = new Reader();
//       parent::__construct($driver, $platform, $queryResultPrototype, $profiler);
//   }
   
   public static function getInstance($changeDriver = null){
      
       if($changeDriver == null){
        // $this->_confReader = Zend\Mvc\Application::getApConfig();
         if(self::$_dbinstance == false){
            return self::$_dbinstance = new MainModelDriver(); 
         }else return self::$_dbinstance;
      } 
   }
} 


