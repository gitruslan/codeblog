<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Application\Model\ArticleModel;

class IndexController extends AbstractActionController
{
    private $_model;
    public function __construct() {
        parent::__construct();
        $this->_model = ArticleModel::getInstance();
        
    }
    
    public function indexAction()
    {
        $this->_view->articles = $this->_model->getArticles();
        $this->_view->title = "Main page - codeblog";
        return $this->_view;
    }
    
    public function articleAction(){
        $alias = explode(".",$this->params('id'));
        if(sizeof($alias) == 2){
            $this->_view->full_article = $this->_model->getArticleByAlias($alias[0]);
            $this->_view->title = $this->_view->full_article['title']." - codeblog";
            $this->_view->keywords = $this->_view->full_article['keywords'];
            $this->_view->description = $this->_view->full_article['description'];
        }else{
             $this->_view->full_article = false;
        }
             
        return $this->_view;
    }
}
