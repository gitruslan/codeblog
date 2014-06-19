<?php

namespace Application\Model;

use Zend\Model\MainModelDriver;

class ArticleModel extends MainModelDriver{

   protected $db = null;
   private   $_art_prefix = "article_";
   protected $_article_type = null;

   public function setArticleType($art_type = null){
        $this->_article_type = $this->_art_prefix.$this->_art_type;
   }

   public function getArticles(){
       $q = $this->db->prepare("SELECT * FROM articles");
       $q->execute();
       return $q->fetchall();
   }

   public function getArticleByAlias($article = ""){
      if(strlen($article) == 0)
          return false;

      $q = $this->db->prepare("SELECT * FROM articles WHERE alias = :alias");
      $q->execute(array(
          ":alias"=>$article
      ));
      return $q->fetch();
   }
   
    
}
