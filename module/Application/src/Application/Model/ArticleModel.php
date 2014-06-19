<?php

namespace Application\Model;

use Zend\Model\MainModelDriver;

class ArticleModel {

   private   $_db           = null;
   private   $_art_prefix   = "article_";
   protected $_article_type = null;
   public static $_instance = null;

   public function __construct(){
       $this->setArticleType();
       $this->_db = MainModelDriver::getInstance()->getDriver()->getResource();
   }

   public function setArticleType($art_type = null){
       $this->_article_type = $this->_art_prefix.$art_type;
   }

   /**
    * return ArticleModel
    */
   public static function getInstance(){
       if(self::$_instance == null)
          return self::$_instance = new self();
       else return self::$_instance;

   }

   public function getArticles(){
       $q = $this->_db->prepare("SELECT * FROM articles");
       $q->execute();
       return $q->fetchall();
   }

   public function getArticleByAlias($article = ""){
      if(strlen($article) == 0)
          return false;

      $q = $this->_db->prepare("SELECT * FROM articles WHERE alias = :alias");
      $q->execute(array(
          ":alias"=>$article
      ));
      return $q->fetch();
   }
   
    
}
