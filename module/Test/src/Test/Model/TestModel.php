<?php 
namespace Test\Model;
use Zend\Model\MainModelDriver;


class TestModel {
   protected $db; 
   public function __construct() {
      $this->db = MainModelDriver::getInstance()->getDriver()->getResource(); 
   } 
    
   public function showArticles(){
  //    $r = new \ReflectionClass($this->db);

      $res = $this->db->prepare("SELECT * FROM articles");
      $res->execute();      
      return $res->fetchall();
   } 
}



